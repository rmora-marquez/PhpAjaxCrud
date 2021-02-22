$(document).ready(function(){
   $('#alerta').hide();
   
   $('#formulario').submit(function(event) {
       event.preventDefault();
       
       var operacion = 'insert';
       if($('#idalumno').length > 0){
           if($('#idalumno').val()!= ''){
               operacion = 'update';
               idalmn = $('#idalumno').val();
           }
       }
       $.ajax({
          type: 'POST',
          url: "php/crud_data.php",
          data:{NIA:$('#NIA').val(),aPaterno:$('#aPaterno').val(),aMaterno:$('#aMaterno').val(),nombre:$('#nombre').val()
              ,curpA:$('#curpA').val(), status:$('#status').val(),ingreso:$('#ingreso').val(),idDomicilio:$('#idDomicilio').val(),
              operacion:operacion, idalumno: idalmn
          }
       }).done(function (msg){
           alert(msg);
           
           if(msg == 'alumno '+ $('#aPaterno').val()+ ' ' +$('#aMaterno').val() + ' ' +$('#nombre').val() +' actualizado'){
               $.ajax({
                    url: "php/crud_data.php"
                }).done(function (html) {
                    $('#content').hide();//html(html);
                }).fail(function () {
                    alert('Error al cargar modulo');
                });
           }else{
               $('#alerta').hide();
               
               $('#NIA').val('');
               $('#aPaterno').val('');
               $('#aMaterno').val('');
                $('#nombre').val('');
                $('#curpA').val('');
                $('#status').val('1');
                $('#ingreso').val('');
                $('#idDomicilio').val('1');                
           }
       }).fail(function(){
           alert("Error enviando los datos. Intente nuevamente");
       });       
   });
                 
});