
var productos = function(){

    var $form = $("#form");

    var eliminarProducto = function(e)
    {
        e.preventDefault();

        var form_borrar = $("#form-borrar");
        var id = $(this).data('id');


        swal({
            title: "Confirmación",
            text: "¿Desea borrar este producto?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "No, Cancelar",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                swal({
                    title: "Eliminado!",
                    type: "success",
                    text: "El producto ha sido eliminado",
                    timer: 1000,
                    showConfirmButton: false
                }, function () {
                    var accion = form_borrar.attr('action').replace('PRODUCTO_ID', id);
                    form_borrar.attr('action', accion);
                    form_borrar.submit();
                });
            }
        });
    }

    

    return {
        init: function() {
            if($form.length)
            {

            }
            else {
                $("#tabla").on("click", '.btn-borrar', eliminarProducto);

                $('#tabla').DataTable({
                    language: {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });
            }



        }
    }

}();



$(document).ready(function() {
    productos.init();
});
