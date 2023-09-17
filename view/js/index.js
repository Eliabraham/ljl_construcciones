$(document).ready(function(){
    $("#cm").on({
        "click":function(){
            $('#myModal').modal('toggle');
        }
    });
});
function mostrar_personal(pers){
    $("#md-nombre").text("Nombre: "+$(`#nombre${pers}`).text());
    $("#md-cargo").text("Posicion: "+$(`#posicion${pers}`).text());
    $("#md-ingles").text("Ingles: "+$(`#ingles${pers}`).text());
    $("#md-contacto").html($(`#contacto${pers}`).clone().show());
    $(`#mod-photo`).html($(`#imagen${pers}`).clone());
    $("#panel_estudios").html($(`#t_estudios${pers}`).clone().show());
    $("#panel_experiencia").html($(`#t_experiencia${pers}`).clone().show());
    $("#panel_proyecto").html($(`#t_proyectos${pers}`).clone().show());
    $('#myModal').modal('show');
}
