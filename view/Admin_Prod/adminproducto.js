
function init (){
  $("#producto_form").on("submit",function(e){
      guardaryeditar(e);
  });
}
$(document).ready(function(){

    $('#tablaProductos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrti',
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/productos.php?op=listar",
            type:"post",
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

    document.getElementById(id="btnProductos").className= "br-menu-link active"
    document.getElementById(id="btnUsuario").className= "br-menu-link"
    document.getElementById(id="btnCompra").className= "br-menu-link"

    $.post("../../controller/categoria.php?op=combo",function(data){
        $("#ID_CAT").html(data);
    });

});

function nuevo(){
    $('#lbltitulo').html('Nuevo Registros');
    $('#producto_form')[0].reset();
    $('#modalproductos').modal('show');
}

function eliminar(ID_Pro){

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success m-2',
          cancelButton: 'btn btn-danger m-2'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Estas Seguro.?',
        text: "No Será Posible Revertirlo.!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: ' Si, Eliminar! ',
        cancelButtonText: ' No, Cancelar! ',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Borrado!',
            'El Instructor Ha Sido Eliminado.',
            'success'
          )
          $.post("../../controller/productos.php?op=BajarProducto",{ID_Pro: ID_Pro},function(data){
            $("#tablaProductos").DataTable().ajax.reload();
        });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'El Instructor Sigue Existiendo :)',
            'error'
          )
        }
      })
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#producto_form")[0]);
    $.ajax({
        url: "../../controller/productos.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $("#modalproductos").modal("hide");
            $("#tablaProductos").DataTable().ajax.reload();
            Swal.fire({
              title: "Good job!",
              text: "You clicked the button!",
              icon: "success"
            });
        }
    });
}
function editar(ID_Pro){
    $('#lbltitulo').html('Editar Registros');
    $.post("../../controller/productos.php?op=DetallePro",{ID_Pro: ID_Pro},function(data){
        data=JSON.parse(data);
        console.log(data);
        $('#ID_Pro').val(data.ID_Pro);
        $('#Nombre').val(data.Nombre);
        $('#ID_CAT').val(data.ID_CAT);
        $('#Descripcion').val(data.Descripcion);
        $('#Descuento').val(data.Descuento);
        $('#Precio').val(data.Precio);
        $('#modalproductos').modal('show');

    });
}

init();