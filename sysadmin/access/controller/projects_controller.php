<?php
include_once __DIR__."/../model/projects.php";
$modelo = new Project;
#print_r($_POST['action']);
#die();
switch ($_POST['action']){
    case 'guardar':
        try{
            $modelo->ingreso(json_decode($_POST['valores']));
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'editar':
        try{
            $modelo->edicion(json_decode($_POST['valores']));
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'listar_categorias':
        try{
            $modelo->listar_categorias();
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'listar_proyectos':
        try{
            $modelo->listar_proyectos();
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'eliminar_proyecto':
        try{
            $modelo->eliminar_proyecto($_POST['valores']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'iniciar_edicion':
        try{
            $modelo->seleccionar_proyecto($_POST['valores']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'buscar_etapas':
        try{
            $modelo->buscar_etapas($_POST['valores']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'actualizar_etapa':
        try{
            $modelo->actualizar_etapas($_POST['nombre'],$_POST['descripcion'],$_POST['condiciones'],$_POST['etapa'],$_POST['proyecto']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'eliminar_etapa':
        try{
            $modelo->eliminar_etapa($_POST['etapa'],$_POST['proyecto']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'actualizar_imagen':
        try{
            $modelo->actualizar_imagen($_POST, $_FILES);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'delete_photo':
        try{
            $modelo->eliminar_fotografia($_POST["imagen"]);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'update_description_fotografia':
        try{
            $modelo->descripcion_fotografia($_POST['imagen'], $_POST['descripcion']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
}
unset($modelo);
