$(document).ready(function() {
    $.ajax({
        url: 'controller/productos.php?op=Inicio',
        type: 'POST',
        success: function(data) {
            $('#productos-container').html(data);
        },
        error: function() {
            console.log('Error al cargar productos');
        }
    });
});


function detallePro(ID_Pro,token){
    window.location.replace("DetalleP.php?ID_Pro="+ID_Pro+"&token="+token);
       
    }

function carrito(){
    Swal.fire("Primero Debes Iniciar Sesión");
}
