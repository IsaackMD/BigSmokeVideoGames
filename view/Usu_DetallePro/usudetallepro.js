// Función para obtener parámetros de la URL
function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

$(document).ready(function(){
    var ID_Pro = getUrlParameter('ID_Pro');
    var token = getUrlParameter('token');
    var token_rsp = sha1(ID_Pro);

    if (token == token_rsp){
        $.post("../../controller/productos.php?op=DetallePro",{ID_Pro: ID_Pro}, function(data) {
            data= JSON.parse(data);
            document.getElementById("Titulo").textContent=data.Nombre;
            document.getElementById("ImagPro").src="../../"+data.Imagen;
            document.getElementById("Desc").textContent=data.Descripcion;
            document.getElementById("Categoria").textContent="Categoria: "+data.Categoria;
            if(data.Descuento > 0 && data.Precio > 0){
                document.getElementById("PrecioNorm").textContent="$"+data.Precio+"MXN";
                document.getElementById("descuento").textContent=data.Descuento+"% Descuento";
                document.getElementById("PrecioVen").textContent="$"+data.PrecioFinal+"MXN";
            }else if(data.Precio==0){
                document.getElementById("PrecioVen").textContent="Gratis";
                $("#PrecioNorm").hide();
                $("#descuento").hide();
            }else{
                document.getElementById("PrecioVen").textContent="$"+data.PrecioFinal+"MXN";
                $("#PrecioNorm").hide();
            }
        });

        $.post("../../controller/productos.php?op=Verificar",{ID_Pro: ID_Pro}, function(data) {
            $('#btn-container').html(data);

        });
    }else{
        location.href ="http://localhost/Big-Smoke_2.0/view/404/index.php";
    }
});

function Agregar(ID_Pro){
    $.ajax({
        url: '../../controller/productos.php?op=Agregar',
        type: 'POST',
        data: {ID_Pro : ID_Pro},
        success: function(data) {
            if(data == 1){
                Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
                });
            }else{
                Swal.fire("Ya Esta En Carrito!");
            }
        },
        error: function() {
            console.log('Error al cargar productos');
        },
    });
}
