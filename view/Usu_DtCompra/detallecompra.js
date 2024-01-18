function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}


$(document).ready(function() {
    var Transaccion_ID = getUrlParameter('key');
    $.post("../../controller/productos.php?op=DetalleCompra",{Transaccion_ID:Transaccion_ID}, function(data) {
        data = JSON.parse(data);
        console.log(data);
       document.getElementById("DetalleComp").textContent="ID De Compra es: "+data['aaData'][0][2];
       document.getElementById("Fecha").textContent="Fecha De Compra: "+data['aaData'][0][3]
       document.getElementById("Total").textContent="Monto Pagado: $"+data['aaData'][0][4]+" MXN";
    });
    table(Transaccion_ID);
    
});

function table(Transaccion_ID){
    $('#DetalleCom_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrti',
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/productos.php?op=DetalleCompra",
            type:"post",
            data: {Transaccion_ID:Transaccion_ID},
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength":10,
        "order": [[0,"desc"]],
        "language":{
            "sProcessing":  "Procesando...",
            "sLengthMenu":   "Mostrar _MENU_ registros",
            "sZeroRecords": "No se Encontrado Resultados",
            "sEmptyTable":     "Lista de Carrito Vacia",
            "sInfoPostFix":    "",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
                "oAria": {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente"
                }
        },
    });
}
