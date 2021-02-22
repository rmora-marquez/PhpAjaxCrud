$(document).ready(function(){
    $('#crearnuevo').click(function(){
//         $('#content').load('data.php');
        $.ajax({ 
            type:"POST",
            url: "data.php",
            data: {},
            success: function(html) {
                $('#content').html(html);            
//                $('#content').load('data.php');
            }
//        }).done(function(html){
//            //$('#content').replaceWith($("#div_data")); //.html($("#div_data"));
//            //$('#content').load('data.php');
//            alert('Cargado data.php');
//            //alert(html);
//           
//           //$('#content').html(html);
//        }).fail(function(){
//            alert('Error al cargar modulo crear data.php');
        });
    });
});

function editar(id){
    //$('#content').load('data.php');
    $.ajax({
        type: "POST",
        url: "data.php",
        data: {operacion: 'update', idalumno: id},
        success: function(html) {
                $('#content').html(html);            
            }
//    }).done(function (html){
//        //$('#content').replaceWith($("#div_data"));
//        //$('#content').load('data.php');
//        //$('#content').html($("#div_data"));
//        //alert('ediar data.php');        
//        //alert(html);
//       //$('#content').html(html); 
//    }).fail(function (){
//        alert("Error al cargar modulo editar");
    });
}

function borrar(id){
    $.ajax({
        type:'POST',
        url: "php/crud_data.php",
        data: {operacion: 'delete', idalumno: id}
    }).done(function (msg){
        alert (msg);
        $(this).parent().parent().remove();
    }).fail(function (){
        alert("Error enviando los datos. Intente nuevamente");
    });
}

