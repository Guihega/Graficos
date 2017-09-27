<?php
    require('conexion/conexion.php');

      //Sucursales//
      $qsucursal = oci_parse($conn, 'SELECT Id_Sucursal, Sucursal FROM DMN_ALSEA_SUCURSAL'); //Consulta
      oci_execute($qsucursal);//Ejecutando consulta
      while (($fila = oci_fetch_array($qsucursal, OCI_BOTH)) != false)
          { 
             $id_sucursal=$fila[0];
             $sucursal=$fila[1];
             $sucursales.="<label><input type='checkbox' name='sucursal[]' value='$id_sucursal'>$sucursal</label><br>";
          }
      //Imprimes la variable que se creó 
      //echo $html;
      oci_free_statement($qsucursal);


      //Años//
      $qaños = oci_parse($conn, 'SELECT DISTINCT Año FROM DMN_ALSEA_TIEMPO'); //Consulta
      oci_execute($qaños);//Ejecutando consulta
      while (($fila = oci_fetch_array($qaños, OCI_BOTH)) != false)
          { 
             //$id_sucursal=$fila[0];
             $año=$fila[0];
             $años.="<option value='$año'>$año</option>";
          }
      oci_free_statement($qaños);


      //Meses
      $qmes = oci_parse($conn, 'SELECT DISTINCT Mes FROM DMN_ALSEA_TIEMPO'); //Consulta
      oci_execute($qmes);//Ejecutando consulta
      while (($fila = oci_fetch_array($qmes, OCI_BOTH)) != false)
          { 
             //$id_sucursal=$fila[0];
             $mes=$fila[0];
             $meses.="<option value='$mes'>$mes</option>";
          }
      oci_free_statement($qmes);


      //Semanas
      $qsemana = oci_parse($conn, 'SELECT DISTINCT NumSemana FROM DMN_ALSEA_TIEMPO'); //Consulta
      oci_execute($qsemana);//Ejecutando consulta
      while (($fila = oci_fetch_array($qsemana, OCI_BOTH)) != false)
          { 
             //$id_sucursal=$fila[0];
             $semana=$fila[0];
             $semanas.="<option value='$semana'>$semana</option>";
          }
      oci_free_statement($qsemana);
      oci_close($conn);
?>