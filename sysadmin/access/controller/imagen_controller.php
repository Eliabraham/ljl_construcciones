<?php
    include_once __DIR__."/../model/personal.php";
    include_once __DIR__."/../model/categoryes.php";
    switch ($_POST['acc']){
        case 'personal':
            try{
                $modelo = new Personal;
                $modelo->actualizar_foto($_FILES['image']['tmp_name']);
                unset ($modelo);
            }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
            break;
        case 'categoria':
            try{
                $modelo = new Category;
                if($_FILES['image1']['tmp_name']!=""){$i1=$_FILES['image1']['tmp_name'];}
                else{$i1="no";}
                if($_FILES['image2']['tmp_name']!=""){$i2=$_FILES['image2']['tmp_name'];}
                else{$i2="no";}
                $modelo->actualizar_imagenes($i1,$i2);
                unset ($modelo);
            }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
            break;
    }
