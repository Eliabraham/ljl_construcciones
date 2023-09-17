<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    $model = new ProgramModel;
    if($_POST['action']=='eliminar'){
        $sql="DELETE FROM tbl_solicitud WHERE id_solicitud=".$_POST['valores'];
        $id=$model->insertar($sql);
        if($id[0]==1){
            print('eliminado');
        }else{
            print_r($id);
        }
    }
    if(($_POST['action']=='minuta') or ($_POST['action']=='proyecto')){
        $sql="SELECT * FROM tbl_solicitud WHERE id_solicitud=".$_POST['valores'];
        $obj=$model->capturar($sql);
        print_r(json_encode($obj));
    }
    if($_POST['action']=='gminuta'){
        $id=$_POST['id'];
        $min=$_POST['valores'];
        $sql="INSERT INTO tbl_solicitud_minuta(id_solicitud, minuta) VALUES($id, '$min')";
        $id=$model->insertar($sql);
        if($id[0]==1){
            print("Minuta agregada satisfactoriamente");
        }else{
            print_r($id);
        }
    }
    if($_POST['action']=='bminuta'){
        $id=$_POST['id'];
        $sql="SELECT * FROM tbl_solicitud_minuta WHERE id_solicitud=".$id;
        $captura=$model->capturar($sql);
        print_r(json_encode($captura));
    }
    if($_POST['action']=='eliminar_nota'){
        $sql="DELETE FROM tbl_solicitud_minuta WHERE id=".$_POST['valores'];
        $id=$model->insertar($sql);
        if($id[0]==1){
            print('eliminado');
        }else{
            print_r($id);
        }
    }