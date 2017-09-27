<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./css/estilos.css" rel="stylesheet" media="screen">
    <link href="./css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/echarts.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/principal2.js"></script>
  </head>
  <body>
    <?php
      require('funciones/datos.php');
    ?>
    <div class="container-fluid">
      <div class="col-md-3">
        <ul id="opciones" class="nav nav-tabs">
          <li class="menu active"><a data-toggle="tab" href="#Fecha">Dia</a></li>
          <li class="menu"><a data-toggle="tab"  href="#Año">Año</a></li>
          <li class="menu"><a data-toggle="tab"  href="#Mes">Mes</a></li>
          <li class="menu"><a data-toggle="tab"  href="#Semana">Semana</a></li>
        </ul>
        <div id="Sucursales">
          <h5>Selecciona la sucursal.</h5>
          <form id="Sucursal" name="Sucursal" method="POST">
            <label><input type="checkbox" id="SelectAll" name="SelectAll" onclick="Seleccionar();">Todas</label><br>
            <?php
            echo $sucursales.'<br>';
            ?>
              <div id="Fecha" class="tab-pane animated fadeInUp active">
                <label for="dtp_input1" class="control-label">Fecha Inicio</label><br>
                <div class="input-group date form_date" data-date="" data-date-format="dd/mm/yy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                  <input class="form-control" name="Fecha" size="12" type="text" value="" readonly>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
                <input type="button" id="btnFecha" value="Grafica" class="btn btn-primary" />
              </div>
              <div id="Años" style="display: none;">
                <label for="dtp_input1" class="control-label">Elige el año:</label><br>
                <select  id="SelectAños" class="form-control" name="Año">
                  <!-- <script> Años();</script> -->
                  <?php
                  echo $años.'<br>';
                  ?>
                </select>
                <input type="button" id="btnAño" value="Grafica" class="btn btn-primary"/>
              </div>
              <div id="Meses" style="display: none;">
                <label for="dtp_input1" class="control-label">Elige el año:</label><br>
                <select  id="SelectAños" class="form-control" name="Año">
                  <!-- <script> Años();</script> -->
                  <?php
                  echo $años.'<br>';
                  ?>
                </select>
                <label for="dtp_input1" class="control-label">Elige el mes:</label><br>
                <select class="form-control" name="Mes">
                  <?php
                  echo $meses.'<br>';
                  ?>
                </select>
                <input type="button" id="btnMes" value="Grafica" class="btn btn-primary"/>
              </div>
              <div id="Semanas" style="display: none;">
                <label for="dtp_input1" class="control-label">Elige el año:</label><br>
                <select  id="SelectAños" class="form-control" name="Año">
                  <!-- <script> Años();</script> -->
                  <?php
                  echo $años.'<br>';
                  ?>
                </select>
                <label for="dtp_input1" class="control-label">Elige la semana:</label><br>
                <select class="form-control" name="Semana">
                  <?php
                  echo $semanas.'<br>';
                  ?>
                </select>
                <input type="button" id="btnSemana" value="Grafica" class="btn btn-primary"/>
              </div>
              <!-- <input type="submit" name="btnBarras" value="Barras" class="btn btn-primary" role="button"> -->
          </form>
        </div>
      </div>
      <div class="col-md-9">
        <div id="container" style="height: 500px; width: 100%;"></div>
      </div>
       <!-- <script type="text/javascript" src="funciones.js"></script> -->
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
    <script type="text/javascript">
      $('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
        });
      $("li.menu a").click(function(){
        if ($(".menu:nth-child(0)").hasClass('active')){
            $("#Fecha").show();
            $("#Años, #Meses, #Semanas").hide();
        }else if($(".menu:nth-child(1)").hasClass('active')){
            $("#Años").show();
            $("#Fecha, #Meses, #Semanas").hide();

        }
        else if($(".menu:nth-child(2)").hasClass('active')){
            $("#Meses").show();
            $("#Fecha,#Años,#Semanas").hide();
        }
        else{
            $("#Semanas").show();
            $("#Fecha,#Años,#Meses").hide();
        }
      });
      //$( "li.menu:nth-child(2)" ).append( "<span> - 2nd!</span>" );
    </script>
  </body>
</html>