<?php
    include_once __DIR__."/../model/personal.php";
    include_once __DIR__."/../model/personal_project.php";
    include_once __DIR__."/../model/personal_experience.php";
    include_once __DIR__."/../model/personal_contact.php";
    include_once __DIR__."/../model/personal_studies.php";
    #print('llego al controlador');
    #print_r($_POST);
    #die();
    $modelo = new Personal;
    switch ($_POST['action']){
        case 'acceder':
            try{
                $modelo->ingreso(json_decode($_POST['valores']));
            }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
            break;
        case 'guardar':
            try{
                $valores      = json_decode($_POST['valores']);
                $contacto     = json_decode($_POST['contacto']);
                $estudios     = json_decode($_POST['estudios']);
                $experiencias = json_decode($_POST['experiencias']);
                $proyectos    = json_decode($_POST['proyectos']);
                $id_personal  = $modelo->agregar($valores);
                if ($id_personal[0]==1){
                    $respuesta="PERSONAL INSERTADO SATISFACTORIAMENTE";
                    $modelo=new Personalcontact;
                    $res_contacto=$modelo->agregar($contacto, $id_personal[1]);
                    $modelo=new Personalestudies;
                    $res_estudios=$modelo->agregar($estudios, $id_personal[1]);
                    $modelo=new Personalexperience;
                    $res_experiencias=$modelo->agregar($experiencias, $id_personal[1]);
                    $modelo=new Personalproyecto;
                    $resproyect = $modelo->agregar($proyectos, $id_personal[1]);
                    print($respuesta.$res_contacto.$res_estudios.$res_experiencias.$resproyect);
                }if($id_personal[0]==2){
                    print($id_personal[1]);
                    die();
                }
            }catch (Exception $e){echo 'Caught exception: '.$e->getMessage()."\n";}
            break;
        case 'editar':
            try{
                if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}                
                $modelo->editar_personal($_SESSION["id_personal_editar"],json_decode($_POST['valores']));
                $contacto     = json_decode($_POST['contacto']);
                $estudios     = json_decode($_POST['estudios']);
                $experiencias = json_decode($_POST['experiencias']);
                $proyectos    = json_decode($_POST['proyectos']);
                #$id_personal  = $modelo->agregar($valores);
                $respuesta="PERSONAL MODIFICADO SATISFACTORIAMENTE";
                $modelo=new Personalcontact;
                $modelo->eliminar($_SESSION["id_personal_editar"]);
                $res_contacto=$modelo->agregar($contacto, $_SESSION["id_personal_editar"]);
                $modelo=new Personalestudies;
                $modelo->eliminar($_SESSION["id_personal_editar"]);
                $res_estudios=$modelo->agregar($estudios, $_SESSION["id_personal_editar"]);
                $modelo=new Personalexperience;
                $modelo->eliminar($_SESSION["id_personal_editar"]);
                $res_experiencias=$modelo->agregar($experiencias, $_SESSION["id_personal_editar"]);
                $modelo=new Personalproyecto;
                $modelo->eliminar($_SESSION["id_personal_editar"]);
                $resproyect = $modelo->agregar($proyectos, $_SESSION["id_personal_editar"]);
                $_SESSION['personal_id_created']=$_SESSION["id_personal_editar"];
                print($respuesta.$res_contacto.$res_estudios.$res_experiencias.$resproyect);
            }catch (Exception $e){echo 'Caught exception: '.$e->getMessage()."\n";}
            break;
        case 'buscar_personal':
            try{
                $modelo->buscar_personal();
            }catch (Exception $e){echo 'Caught exception: '.$e->getMessage()."\n";}
            break;
        case 'eliminar_personal':
            try{
                $modelo->eliminar_personal($_POST['data']);
            }catch (Exception $e){echo 'Caught exception: '.$e->getMessage()."\n";}
            break;
        case 'capturar_personal':
            if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
            #variable usuada para el control de datos
            $_SESSION["id_personal_editar"] = $_POST['data'];
            #variable usada para el control de imagenes
            $_SESSION['personal_id_created'] = $_POST['data'];
            $datos_personales=$modelo->capturar_personal($_SESSION["id_personal_editar"]);
            $modelo=new Personalcontact;
            $datos_contacto=$modelo->capturar_contacto($_SESSION["id_personal_editar"]);
            $modelo=new Personalestudies;
            $datos_estudios=$modelo->capturar_estudios($_SESSION["id_personal_editar"]);
            $modelo=new Personalexperience;
            $datos_experiencias=$modelo->capturar_experiencia($_SESSION["id_personal_editar"]);
            $modelo=new Personalproyecto;
            $datos_proyecto = $modelo->capturar_proyecto($_SESSION["id_personal_editar"]);
            print_r(json_encode(array($datos_personales, $datos_contacto, $datos_estudios, $datos_experiencias, $datos_proyecto)));
            break;
    }
    unset($modelo);
    
