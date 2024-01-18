function init(){
    $("#usuarios_form").on("submit",function(e){
        guardaryeditar(e);
    });
    
}

$(document).ready(function(){
    $('#tablaUsuarios').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrti',
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/usuario.php?op=ListarUsu",
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
    document.getElementById(id="btnProductos").className= "br-menu-link "
    document.getElementById(id="btnUsuario").className= "br-menu-link active"
    document.getElementById(id="btnCompra").className= "br-menu-link"
});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#usuarios_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $("#modalusuarios").modal("hide");
            $("#tablaUsuarios").DataTable().ajax.reload();
            Swal.fire({
              title: "Good job!",
              text: "You clicked the button!",
              icon: "success"
            });
        }
    });
}

function nuevo(){
    $('#lbltitulo').html('Nuevo Registros');
    $('#usuarios_form')[0].reset();
    $('#modalusuarios').modal('show');
}

function editar(UsuarioID){
    $('#lbltitulo').html('Editar Registros');
    $.post("../../controller/usuario.php?op=DetalleUsu",{UsuarioID : UsuarioID},function(data){

        data=JSON.parse(data);
        console.log(data);
        $('#UsuarioID').val(data.UsuarioID);
        $('#Nombre').val(data.Nombre);
        $('#Apellido_P').val(data.Apellido_P);
        $('#Apellido_M').val(data.Apellido_M);
        $('#Correo').val(data.Correo);
        $('#Password').val(data.Password);
        $('#modalusuarios').modal('show');
    })
}

function eliminar(UsuarioID){

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
            'El Usuario Ha Sido Eliminado.',
            'success'
          )
          $.post("../../controller/usuario.php?op=BajaUsu",{UsuarioID: UsuarioID},function(data){
            $("#tablaUsuarios").DataTable().ajax.reload();
        });
        } else if (
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

init();