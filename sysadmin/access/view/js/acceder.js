$(document).ready(function(){
    formato.required_marker();
    $("#acceder").on({
        "click":function(){
            let datos = info.get_data(['val1'],this);
            let accion = datos.action;
            let valores = JSON.stringify(datos.written);
            info.request_missing_data(datos.err);
            $.ajax({
                type: "POST",
                url: `../../controller/${datos.controller}_controller.php`,
                data: {'action':accion,'valores':valores},
            })
            .done(function(resp){
                let res = JSON.parse(resp);
                if (Object.keys(res).length>1){
                    $("nav").html(res[Object.keys(res)[1]]);
                    $("section").html("");
                }else{
                    $.notify(res[Object.keys(res)[0]], "warn");
                }
            })
            .fail(function(jqXHR, textStatus){
                formato.error_ajax(jqXHR, textStatus)
            });
        }
    });
})