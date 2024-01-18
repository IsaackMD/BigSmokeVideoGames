var UsuarioID = $('#usu_idx').val();

$(document).ready(function() {
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
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
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

   $.post("../../controller/productos.php?op=Total",{UsuarioID:UsuarioID}, function(data) {
    data= JSON.parse(data);
    document.getElementById("total").textContent="$"+data+" MXN";
  });
});

function eliminar(DtVentaID){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success m-1",
      cancelButton: "btn btn-danger m-1"
    },
    buttonsStyling: false
  });
  swalWithBootstrapButtons.fire({
    title: "Desea Eliminar el juego.?",
    text: "El Juego se eliminara del carrito",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "si, eliminar",
    cancelButtonText: "No, cancelar!",
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire({
        title: "Eliminado!",
        text: "Juego Eliminado del Carrito.",
            icon: "success"
          });
          $.post("../../controller/productos.php?op=Eliminar",{DtVentaID: DtVentaID}, function(data){
            $('#carrito_data').DataTable().ajax.reload();
            document.getElementById("total").textContent="$ 0.00 MXN";
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire({
            title: "Cancelado",
            text: "El Juego sigue en el carrito",
            icon: "error"
          });
        }
      });
}

