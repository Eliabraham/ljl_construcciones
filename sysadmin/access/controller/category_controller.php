<?php
include_once __DIR__."/../model/categoryes.php";
$modelo = new Category;
switch ($_POST['action']){
    case 'guardar':
        try{
            $modelo->agregar(json_decode($_POST['valores']));
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'editar':
        try{
            $modelo->editar(json_decode($_POST['valores']));
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'buscar_categoria':
        try{
            $modelo->buscar_categoria();
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'eliminar_categoria':
        try{
            $modelo->eliminar_categoria($_POST['valores']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
    case 'iniciar_edicion':
        try{
            $modelo->traer_categoria($_POST['valores']);
        }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        break;
}
unset ($modelo);
