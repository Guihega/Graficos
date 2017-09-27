<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  //if(isset($_POST['btnBarras']))
  { 
    $sucrec;
    $Fecha=$_POST["Fecha"];
    $sucursal=$_POST["sucursal"];
    $grafico=$_POST["Grafico"];
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
    $conn = oci_connect('alsea', 'alsea2017', '192.168.15.41:1521/alseaPDB','AL32UTF8');
    if (!$conn) 
    {
      $m = oci_error();
      echo $m['message'], "\n";
      exit;
    }
    else{
        $sucursales=[];
        $ventas=[];
        $query ='SELECT S.SUCURSAL, V.TOTAL_VENTAS
                FROM FACTS_ALSEA_VENTAS V, DMN_ALSEA_SUCURSAL S
                WHERE V.ID_TIEMPO=(SELECT T.ID_TIEMPO 
                                   FROM DMN_ALSEA_TIEMPO T 
                                   WHERE T.FECHA='."'$Fecha'".') 
                AND S.ID_SUCURSAL =V.ID_SUCURSAL AND V.ID_SUCURSAL IN ('.$sucrec.')';
                echo $grafico;
        $stid = oci_parse($conn, $query);
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
  var grafico = <?php echo json_encode($grafico);?>;
  var myChart = echarts.init(dom);
  alert(grafico);
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
            type: grafico,
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
