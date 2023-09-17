<?php
    $ruta = __DIR__."/../view/html/".strtolower($_POST['action']).".php";
    $ht = include_once($ruta);

