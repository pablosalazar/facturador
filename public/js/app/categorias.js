
var categorias = function(){

    var form = $("#form");

    var eliminarCategoria = function(e)
    {
        e.preventDefault();

        var form_borrar = $("#form-borrar");
        var id = $(this).data('id');


        swal({
            title: "Confirmación",
            text: "¿Desea borrar esta catégoria?",
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
                    text: "La catégoria ha sido eliminada",
                    timer: 1000,
                    showConfirmButton: false
                }, function () {
                    var accion = form_borrar.attr('action').replace('ID', id);
                    form_borrar.attr('action', accion);
                    form_borrar.submit();
                });
            }
        });
    }

    var enviarFormulario = function(e)
    {
        e.preventDefault();
        if(!$("#config").is(":visible"))
        {
            $("#filas").html("");
        }
        form.submit();
    }

    return {
        init: function() {
            if(form.length)
            {
                $("#ckb_precios").change(function(e) {
                    $( "#config" ).toggle("slow");
                });

                if( $('#ckb_precios').prop('checked') ) {
                    $( "#config" ).toggle("show");
                }

                $("#form").on("click", '.btn-guardar', enviarFormulario);
            }
            else {
                $("#tabla").on("click", '.btn-borrar', eliminarCategoria);

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
    categorias.init();
});
