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
        $.post("controller/productos.php?op=DetallePro",{ID_Pro: ID_Pro}, function(data) {
            data= JSON.parse(data);
            document.getElementById("Titulo").textContent=data.Nombre;
            document.getElementById("ImagPro").src=data.Imagen;
            document.getElementById("Desc").textContent=data.Descripcion;
            document.getElementById("Desc").textContent=data.Descripcion;
            document.getElementById("Categoria").textContent="Categoria: "+data.Categoria;
            if(data.Descuento > 0){
                document.getElementById("PrecioNorm").textContent="$"+data.Precio+"MXN";
                document.getElementById("descuento").textContent=data.Descuento+"% Descuento";
                document.getElementById("PrecioVen").textContent="$"+data.PrecioFinal+"MXN";
            }else{
                document.getElementById("PrecioVen").textContent="$"+data.PrecioFinal+"MXN";
                $("#PrecioNorm").hide();
            }
        });
    }else{
        location.href ="http://localhost/Big-Smoke_2.0/view/404/index.php";
    }
});

function carrito(){
    Swal.fire("Primero Debes Iniciar Sesión");
}
