
var precios = function(){

    var $form = $("#form");

    var agregarFilaPrecios = function(precio)
    {
        $("#filas").append(getFilaPrecios(precio)).children(':last').hide().fadeIn(500);
    }

    var eliminarFilaPrecios = function()
    {
        var accion = $form.attr('action');

        if(accion.indexOf('productos') >= 0){
            var filas = $("#config").find('.fila-precio');

            if(filas.length > 1) {
                $(this).closest('.fila-precio').fadeOut(500, function() {
                    $(this).remove();
                });
            }
            else {
                swal("No puedes borrar todos los precios!", "Los productos debe tener almenos un precio definido.", "warning");
            }
        } else {
            $(this).closest('.fila-precio').fadeOut(500, function() {
                $(this).remove();
            });
        }

    }

    var getFilaPrecios = function(precio)
    {
        if ( precio === undefined)
        {
            precio = {
                venta : "",
                costo: "",
                referencia: ""
            }
        }
        else {
            if(precio.venta == null) {
                precio.venta = "";
            }

            if(precio.costo == null) {
                precio.costo = "";
            }

            if(precio.referencia == null) {
                precio.referencia = "";
            }
        }

        return '' +
            '<div class="row bg-white padding-tb-10 margin-top-10 fila-precio">' +
                '<div class="col-md-5">' +
                    '<div class="form-group">' +
                        '<label>Nombre</label>' +
                        '<input type="text" name="precios[referencia][]" value="' + precio.referencia + '" class="form-control" >' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                    '<div class="form-group">' +
                        '<label>Precio de venta  <span class="f_req">*</span></label>' +
                        '<input type="text" name="precios[venta][]" value="' + precio.venta + '" class="form-control text-right" placeholder="$">' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                    '<div class="form-group">' +
                        '<label>Precio de costo</label>' +
                        '<input type="text" name="precios[costo][]" value="' + precio.costo + '" class="form-control text-right" placeholder="$">' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-3 text-center">' +
                    '<br>' +
                    '<a href="javascript:;" class="btn btn-circle btn-icon-only red btn-borrar">' +
                    '<i class="glyphicon glyphicon-trash"></i>' +
                    '</a>' +
                '</div>' +
            '</div>';

    }

    var cargarPreciosCategoria = function(e)
    {
        id = $("#categorias option:selected").val();

        $("#filas").html("");

        $.ajax({
            url: url_base + "precios/categoria/" + id,
            type: 'GET'
        }).done(function(data) {
            data.forEach(function(datos){
                agregarFilaPrecios(datos);
            });
        });
    }

    return {
        init: function() {
            $( "#categorias" ).change(cargarPreciosCategoria);
            $( "#config" ).on("click", '#btn-agregar', function(){
                agregarFilaPrecios();
            });
            $( "#config" ).on("click", '.btn-borrar', eliminarFilaPrecios);
        }
    }

}();



$(document).ready(function() {
    precios.init();
});

