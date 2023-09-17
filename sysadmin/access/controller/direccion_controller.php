<?php
    $ruta = __DIR__."/../view/html/".strtolower($_POST['action']);
    $ht = include_once($ruta);

