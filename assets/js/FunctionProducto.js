/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function prueba() {
    swal({
        title: 'Multiple inputs',
        html:
                '<input id="swal-input1" class="swal2-input">' +
                '<input id="swal-input2" class="swal2-input">',
        preConfirm: function () {
            return new Promise(function (resolve) {
                resolve([
                    $('#swal-input1').val(),
                    $('#swal-input2').val()
                ])
            })
        },
        onOpen: function () {
            $('#swal-input1').focus()
        }
    }).then(function (result) {
        swal(JSON.stringify(result))
    }).catch(swal.noop)
}

//funcion que se ejecuta para eliminar productos 
function eliminarProducto(cod, chx) {
    $.ajax({
        data: "action=EliminarProducto&txt_id=" + cod,
        url: "./core/controler/Producto/controladorProducto.php",
        type: "POST",
        success: function (res) {
            $.each(res, function (i, item) {
                mensaje(item.code, "", item.message);
            });
            CargarTablaProducto(1);
        }
    });
}
//mensaje para confirmar la eliminacion de un producto
function mensajeeliminar(cod, chx) {
    swal({
        title: 'Estas seguro?',
        text: "El producto sera eliminado pero puede ser recuperado luego",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.value) {
            eliminarProducto(cod, chx);
        }
    })
}




//Toast superior que muestra los mensajes al usuario, context sirve para instanciar que tipo de mensaje es, titulo el titulo del mensaje, y mensaje el mensaje a mostrar
function mensaje(context, titulo, mensaje) {
    //comprueba si el mensaje es de accion correcta o erronea
    if (context >= 0) {
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        toast({
            type: 'success',
            title: mensaje
        })
    } else {
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        toast({
            type: 'error',
            title: mensaje
        })
    }

}
//accion que se ejecuta al precionar la m para modificar un productos, esta despliega el formulario de modificacion y setea los valores correspondientes a cada producto
function m(cod) {
    $.ajax({
        data: "action=productoPorCode&txt_id=" + cod,
        url: "./core/controler/Producto/controladorProducto.php",
        type: "POST",
        success: function (resp) {
            $registros = resp.split("-");
            $('#txt_id_mod').val($registros[0]);
            $('#txt_nombre_mod').val($registros[1]);
            $('#txt_subfamilia_mod').val($registros[2]);
            if ($registros[3] === "L") {
                $('#txt_unidad_mod').val(2);
            } else {
                $('#txt_unidad_mod').val(1);
            }
            $('#txt_stock_mod').val($registros[4]);
            $('#txt_estado_mod').val($registros[5]);
        }
    });
    $('#modalmod').modal("show");
}

//despliega el formulario de ingreso de poroductos
function desplegar() {
    $('#modalIng').modal("show");
}
//limpia los campos de ambos formularios
function limpiar() {
    $('#txt_nombre').val('');
    $('#txt_subfamilia').val(1);
    $('#txt_unidad').val(1);
    $('#txt_stock').val('');
    $('#txt_id_mod').val('');
    $('#txt_estado_mod').val('');
    $('#txt_nombre_mod').val('');
    $('#txt_subfamilia_mod').val(1);
    $('#txt_unidad_mod').val(1);
    $('#txt_stock_mod').val('');
}
//carga desde base de datos los producos en el sistema
function CargarTablaProducto(cod) {
    $.ajax({
        data: "action=ListarProducto&cod=" + cod,
        url: "./core/controler/Producto/controladorProducto.php",
        type: "POST",
        success: function (res) {
            $('#TbProductos').html(res);
        }
    });
}
//carga el combobox para selecionar una subfamilia
function ComboSubFamilia() {
    $.ajax({
        data: "action=comboSubFamilia",
        url: "./core/controler/subFamilia/controladorSubFamilia.php",
        type: "POST",
        success: function (res) {
            $('#txt_subfamilia').html(res);
            $('#txt_subfamilia_mod').html(res);
        }
    });
}

//funcion que se ejecuta al cargar la pagina, para cargar tablas y combobox
$(document).ready(function () {
    //prueba();
    CargarTablaProducto(1);
    ComboSubFamilia();
    $("#ch_visual").click(function () {
        //verifica si el checkbox para ver productos eliminados esta selecionado    
        if ($("#ch_visual").is(':checked')) {
            CargarTablaProducto(0);
        } else {
            CargarTablaProducto(1);
        }
    });

    //funcion que se ejecuta al enviar el formulario de ingreso de productos
    $('#frmProducto').submit(function (e) {
        $.ajax({
            data: $(this).serialize() + "&action=InsertarProducto",
            url: "./core/controler/Producto/controladorProducto.php",
            type: "POST",
            dataType: "JSON",
            success: function (res) {
                // foreach que recorre las respuestas de ajax para extraer el mensaje a mostrar    
                $.each(res, function (i, item) {
                    mensaje(item.code, "", item.message);
                });
                limpiar();
                CargarTablaProducto(1);
                $('#modalIng').modal("toggle");
                console.log(res);
            }
        })
        e.preventDefault();
        return false;
    });
    //funcion que se ejecuta al enviar el formulario de modificacion de productos
    $('#frmProducto_mod').submit(function (e) {
        $.ajax({
            data: $(this).serialize() + "&action=modProducto",
            url: "./core/controler/Producto/controladorProducto.php",
            type: "POST",
            dataType: "JSON",
            success: function (res) {
                // foreach que recorre las respuestas de ajax para extraer el mensaje a mostrar    
                $.each(res, function (i, item) {
                    mensaje(item.code, "", item.message);
                });
                limpiar();
                CargarTablaProducto(1);
                $('#modalmod').modal("hide");
                console.log(res);
            }
        })

        e.preventDefault();
        return false;
    });
});

