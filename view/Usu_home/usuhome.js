$(document).ready(function() {
    $.ajax({
        url: '../../controller/productos.php?op=Inicio',
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
    window.location.replace("../Usu_DetallePro/index.php?ID_Pro="+ID_Pro+"&token="+token);
    }
    function Comprar(ID_Pro){
        $.ajax({
            url: '../../controller/productos.php?op=Agregar',
            type: 'POST',
            data: {ID_Pro : ID_Pro},
            success: function(data) {
                if(data == 1){
                    window.location.replace("../Usu_Carrito/index.php");
                }else{
                    Swal.fire("Ya Esta En Carrito!");
                }
            },
            error: function() {
                console.log('Error al cargar productos');
            },
        });
    }

