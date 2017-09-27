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
    <script type="text/javascript">
      function Seleccionar()
      {
        for (i=0;i<document.Sucursal.elements.length;i++) 
        if(document.Sucursal.elements[i].type == "checkbox")
          if(document.Sucursal.SelectAll.checked == 1)
          document.Sucursal.elements[i].checked=1 
          else
          document.Sucursal.elements[i].checked=0 
      }

      $(document).ready(function() {
       // Esta primera parte crea un loader no es necesaria
        $().ajaxStart(function() {
            $('#loading').show();
            $('#container').hide();
        }).ajaxStop(function() {
            $('#loading').hide();
            $('#container').fadeIn('slow');
        });
             //Interceptamos el evento submit
        $('#form, #fat, #Sucursal').submit(function() {
      // Enviamos el formulario usando AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                // Mostramos un mensaje con la respuesta de PHP
                success: function(data) {
                    $('#container').html(data);
                }
            })        
            return false;
        });
      })
    function MostrarAños(){
        var myDate = new Date();
        var year = myDate.getFullYear();
        for(var i = 2010; i < year+1; i++){
          document.write('<option value="'+i+'">'+i+'</option>');
      }
    }
    </script>
  </head>
  <body>
    <?php
      require('funciones/datos.php');
    ?>
    <div class="container-fluid">
      <div class="col-md-3">
        <div id="Sucursales">
          <h5>Selecciona la sucursal.</h5>
          <form id="Sucursal" name="Sucursal" method="POST" action="funciones/grafico_anual.php">
            <label><input type="checkbox" id="SelectAll" name="SelectAll" onclick="Seleccionar();">Todas</label><br>
            <?php
            echo $sucursals.'<br>';
            ?>
            <div id="Años">
              <select class="form-control" name="Año">
                <!-- <?php
                echo $años.'<br>';
                ?> -->
                <script> MostrarAños();</script>
              </select>
            </div>
            <input type="submit" id="btnAño" value="Grafica" class="btn btn-primary"/>
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
    </script>
  </body>
</html>