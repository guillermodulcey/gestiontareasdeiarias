var tareaGuardarAjax = function (form) {
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var idTarea = data.idTarea;
            var txtNombreTarea = $("#txt-tarea-nombre-" + idTarea);
            var pViejoTarea = $("#p-tarea-nombre-" + idTarea);
            pViejoTarea.text(txtNombreTarea.val());
            tareaCerrar(null);
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divExito: $("#exito-principal"),
        divError: $(form).find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};
