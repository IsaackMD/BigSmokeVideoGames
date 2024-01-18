var UsuarioID = $('#usu_idx').val();
$(document).ready(function() {
    carrito(UsuarioID);
    total(UsuarioID);
});

function carrito(UsuarioID){
    $('#carrito_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrti',
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/productos.php?op=Carrito",
            type:"post",
            data: {UsuarioID,UsuarioID},
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

function total(UsuarioID){
    $.post("../../controller/productos.php?op=Total",{UsuarioID:UsuarioID}, function(dataTotal) {
        dataTotal = JSON.parse(dataTotal);
        document.getElementById("total").textContent="$"+dataTotal+" MXN";

        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value: dataTotal // precio de la compra
                        }
                    }]
                })
            },
            onApprove: function(data,actions){
                actions.order.capture().then(function(detalles){
                    
                    let url = 'captura.php'
                    return fetch(url,{
                        method:'POST',
                        headers: {
                            'content-type' : 'application/json'
                        },
                        body: JSON.stringify({
                            detalles : detalles
                        })
                    })
                    // .then(function(response){
                    //     window.location.href="completado.php?key="+ detalles['id'];
                    // });
                    
                });
            },
            onCancel: function(data){
                Swal.fire({
                    icon: "error",
                    title: "Compra Cancelada...",
                    text: "La Compra Ha Sido Cancelada"
                  });
            }
        }).render('#paypal-button-container');
       carrito(UsuarioID);
      });
}



