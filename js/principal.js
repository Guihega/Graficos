function SeleccionarDia()
{
  for (i=0;i<document.SucursalDia.elements.length;i++) 
  if(document.SucursalDia.elements[i].type == "checkbox")
    if(document.SucursalDia.SelectAll.checked == 1)
    document.SucursalDia.elements[i].checked=1 
    else
    document.SucursalDia.elements[i].checked=0 
}

function SeleccionarAño()
{
  for (i=0;i<document.SucursalAño.elements.length;i++) 
  if(document.SucursalAño.elements[i].type == "checkbox")
    if(document.SucursalAño.SelectAll.checked == 1)
    document.SucursalAño.elements[i].checked=1 
    else
    document.SucursalAño.elements[i].checked=0 
}
function SeleccionarMes()
{
  for (i=0;i<document.SucursalMes.elements.length;i++) 
  if(document.SucursalMes.elements[i].type == "checkbox")
    if(document.SucursalMes.SelectAll.checked == 1)
    document.SucursalMes.elements[i].checked=1 
    else
    document.SucursalMes.elements[i].checked=0 
}
function SeleccionarSemana()
{
  for (i=0;i<document.SucursalSemana.elements.length;i++) 
  if(document.SucursalSemana.elements[i].type == "checkbox")
    if(document.SucursalSemana.SelectAll.checked == 1)
    document.SucursalSemana.elements[i].checked=1 
    else
    document.SucursalSemana.elements[i].checked=0 
}

function MostrarAños(){
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
  //Interceptamos el evento submit
    $('#SucursalDia').submit(function() {
      e.preventDefault();
      var form = $(this);
      var post_url = form.attr('action');
      var post_data = form.serialize();
  // Enviamos el formulario usando AJAX
      $.ajax({
          type: 'POST',
          url: post_url,
          data: post_data,
          $('#loader3', form).html('<img src="../../images/ajax-loader.gif" />       Please wait...');
          // Mostramos un mensaje con la respuesta de PHP
          success: function(data) {
            $('#container').html(data);
          }
      })        
      return false;
    });

          //Interceptamos el evento submit
    $('#SucursalAño').submit(function() {
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
  //Interceptamos el evento submit
    $('#SucursalMes').submit(function() {
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
  //Interceptamos el evento submit
    $('#SucursalSemana').submit(function() {
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
