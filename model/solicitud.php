<?php
include_once('mprincipal.php');
$model = new ProgramModel;
$nombre=$_POST['valnombre'];
$representado=$_POST['valrepresentado'];
$valtelefono=$_POST['valtelefono'];
$valemail=$_POST['valemail'];
$asunto=$_POST['valasunto'];
$sql="INSERT INTO tbl_solicitud (nombre, apoderado, telefono, correo, descripcion, estado) VALUES('$nombre', '$representado', '$valtelefono', '$valemail','$asunto', 'pendiente')";
$insercion=$model->insertar($sql);
if($insercion[0]==1){
    print("DATOS ENVIADOS A LJL CONTRUCCIONES DE FORMA SATISFACTORIA");
}
$id=$insercion[1];
$arch = addslashes(file_get_contents($_FILES['fotos']['tmp_name']));
$desc = $_POST['description_file_0'];
$sgl="INSERT INTO tbl_solicitud_file (id_solicitu, archivo, descripcion) VALUES($id, '$arch', '$desc')";
$model->insertar($sgl);