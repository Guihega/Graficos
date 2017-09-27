function Seleccionar()
  {
    for (i=0;i<document.Sucursal.elements.length;i++) 
    if(document.Sucursal.elements[i].type == "checkbox")
      if(document.Sucursal.SelectAll.checked == 1)
      document.Sucursal.elements[i].checked=1 
      else
      document.Sucursal.elements[i].checked=0 
  }

function Años(){
    var myDate = new Date();
    var year = myDate.getFullYear();
    for(var i = 2010; i < year+1; i++){
      document.write('<option value="'+i+'">'+i+'</option>');
  }
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
//  //Interceptamos el evento submit
//   $('#form, #fat, #Sucursal').submit(function() {
// // Enviamos el formulario usando AJAX
//       $.ajax({
//           type: 'POST',
//           url: $(this).attr('action'),
//           data: $(this).serialize(),
//           // Mostramos un mensaje con la respuesta de PHP
//           success: function(data) {
//               $('#container').html(data);
//           }
//       })        
//       return false;
//   });

$('#btnFecha').click(function(){
  var url = "./funciones/grafico_dia.php";
  $.ajax({                        
     type: "POST",                 
     url: url,                     
     data: $("#Sucursal").serialize(), 
     success: function(data)             
     {
       $('#container').html(data);               
     }
    });
  });
$('#btnAño').click(function(){
  var url = "funciones/grafico_anual.php";
  $.ajax({                        
     type: "POST",                 
     url: url,                     
     data: $("#Sucursal").serialize(), 
     success: function(data)             
     {
       $('#container').html(data);               
     }
    });
  });
$('#btnMes').click(function(){
  var url = "./funciones/grafico_mes.php";
  $.ajax({                        
     type: "POST",                 
     url: url,                     
     data: $("#Sucursal").serialize(), 
     success: function(data)             
     {
       $('#container').html(data);               
     }
    });
  });
$('#btnSemana').click(function(){
  var url = "funciones/grafico_semana.php";
  $.ajax({                        
     type: "POST",                 
     url: url,                     
     data: $("#Sucursal").serialize(), 
     success: function(data)             
     {
       $('#container').html(data);               
     }
    });
  });
})