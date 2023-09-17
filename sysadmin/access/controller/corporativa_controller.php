<?php
    include_once __DIR__."/../model/corporativa.php";
    $modelo = new Corporativa;
    switch ($_POST['accion']){
        case 'buscar_vision':
            $modelo->buscar_v();
            break;
        case 'buscar_mision':
            $modelo->buscar_m();
            break;
        case 'buscar_historia':
            $modelo->buscar_h();
            break;
        case 'mision':
            $modelo->mision($_POST,$_FILES);
            break;
        case 'vision':
            $modelo->vision($_POST,$_FILES);
            break;
        case 'historia':
            $modelo->historia($_POST,$_FILES);
            break;
        case 'valores':
            $modelo->valores($_POST['valores']);
            break;
        case 'jumbotrom':
            $modelo->jumbotrom($_POST,$_FILES);
            break;
        case 'del_imagen':
            $modelo->eliminar_imagen($_POST['id']);
            break;
        case 'buscar_valores':
            $modelo->buscar_valores();
            break;
        case 'buscar_jt':
            $modelo->buscar_jt();
            break;
        case 'contacto':
            $modelo->contacto($_POST['contacto']);
            break;
        case 'buscar_contactos':
            $modelo->buscar_contactos();
            break;
        case 'politica':
            $modelo->politica($_POST['politica']);
            break;
        case 'buscar_politica':
            $modelo->buscar_politica();
            break;
    }
    unset($modelo);
