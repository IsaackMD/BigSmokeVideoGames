var UsuarioID = $('#usu_idx').val();

$(document).ready(function() {
   $('#biblioteca_data').DataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: 'Bfrti',
    buttons:[
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
    ],
    "ajax":{
        url:"../../controller/productos.php?op=Biblioteca",
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
});

function descargar(){
    let timerInterval;
Swal.fire({
  title: "Descargando..",
  html: "El Juego Se Esta Descargando.. <b></b>",
  timer: 6500,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    Swal.fire({
        title: "Juego Descargado!",
        text: "Ya Puedes Disfrutar tu juego.",
        icon: "success"
      });
  }
});
}