<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  //if(isset($_POST['btnBarras']))
  { 
    $sucrec;
    $año=$_POST["Año"];
    $semana=$_POST["Semana"];
    $sucursal=$_POST["sucursal"];
    $count = count($sucursal);
    for ($i = 0; $i < $count; $i++) {
        if ($i==0) {
            $sucrec=$sucursal[$i];
        }
        else
        {
          $sucrec=$sucrec.','.$sucursal[$i];
        }
    }
    $conn = oci_connect('alsea', 'alsea2017', '192.168.15.41:1521/alseaPDB', 'AL32UTF8');
    if (!$conn) 
    {
      $m = oci_error();
      echo $m['message'], "\n";
      exit;
    }
    else{
        $sucursales=[];
        $ventas=[];
        $query ='SELECT S.SUCURSAL, SUM(V.TOTAL_VENTAS) AS ventas
                FROM FACTS_ALSEA_VENTAS V, DMN_ALSEA_SUCURSAL S, DMN_ALSEA_TIEMPO T
                WHERE V.ID_TIEMPO= T.ID_TIEMPO AND T.AÑO='.$año.' AND T.NUMSEMANA='.$semana.'
                AND S.ID_SUCURSAL =V.ID_SUCURSAL AND V.ID_SUCURSAL IN ('.$sucrec.')
                GROUP BY S.SUCURSAL';
        $stid = oci_parse($conn, $query);
        //oci_bind_by_name($stid, ':$sucrec', $sucrec);
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) 
          {
            array_push($sucursales, $row[0]);
            array_push($ventas, $row[1]);
          }
        oci_free_statement($stid);
    }
  }
?>

<script type="text/javascript">
  var dom = document.getElementById("container");
  var myChart = echarts.init(dom);
  var app = {};
  option = null;
  option = {
      color: ['#3398DB'],
      title: {
          text:''
      },
      tooltip : {
          trigger: 'axis',
          axisPointer : {
              type : 'shadow'
          }
      },
      grid: {
          left: '10%',
          right: '4%',
          bottom: '3%',
          containLabel: true
      },
      toolbox: {
          feature: {
              saveAsImage: {}
          }
      },
      xAxis: {
          type: 'category',
          boundaryGap: false,
          data: <?php echo json_encode($sucursales);?>,
          axisTick: {
              alignWithLabel: true
          }
      },
      yAxis: {
          type: 'value'
      },
      series: [
          {
              name:'',
              type:'bar',
              barWidth: '60%',
              data:<?php echo json_encode($ventas);?>
          }
      ]
  };
  ;
  if (option && typeof option === "object") {
      myChart.setOption(option, true);
  }
</script>