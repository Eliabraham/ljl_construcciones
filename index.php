<?php
    include_once('model/bd_show.php');
    include_once('model/mprincipal.php');
    $cone = new Conexion_lct;
    $model = new ProgramModel;
?>
<!DOCTYPE html>
<html lang="en,es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LJL CONSTRUCCIONES somos una empresa dedicada a la ciencia y arte de la construcción, contamos con experiencia en el area de viviendas y edificios comerciales. Ofrecemos servicios de construcción de alta calidad y proyectos a medida para satisfacer las necesidades y deseos de nuestros clientes. Trabajamos con un equipo altamente capacitado y utilizamos materiales de la mejor calidad para garantizar la durabilidad y seguridad de nuestras construcciones. Contáctanos para obtener más información sobre nuestros servicios o para solicitar un presupuesto.">
    <meta name="keywords" content="jlj,ljl,jljconstrucciones,ljlconstrucciones,construcción,paisajismo,urbanismo,obra civil, concreto,corte de concreto,ampliación de estructura,reparación de estructura,piscinas,quinchos,remodelación,techado,constructora Santiago de Chile,constructora Viña del Mar,constructora chilena,edificación,proyectos de construcción,materiales de construcción,arquitectura,ingeniería,empresa de construcción en Santiago,ereipa">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="LJL Construcciones - Especialistas en construcción y remodelaciones">
    <meta property="og:description" content="LJL Construcciones es una empresa especializada en construcción y remodelaciones, ofrecemos servicios de alta calidad y profesionalismo. Contamos con un equipo de arquitectos y ingenieros altamente capacitados para brindarle soluciones en construcción y diseño para su hogar o negocio. ">
    <meta property="og:url" content="http://www.ejemplo.com/">
    <!--<meta property="og:image" content="http://www.ejemplo.com/view/img/transparente.jpeg">
    <link rel="canonical" href="http://www.ejemplo.com/index.php">-->
    <meta name="author" content="Ing. Eliud Español">
    <link rel="author" href="https://www.ejemplo.com/about">
    <link rel="publisher" href="https://www.ejemplo.com/">
    <meta name="copyright" content="Copyright (c) 2023 JlJ Construcciones">
    <meta name="revisit-after" content="3 days">
    <meta name="language" content="es">
    <meta name="language" content="en">
    <meta name="rating" content="general">
    <!--<meta name="googlebot" content="noodp">: Este ejemplo indica a Google que no utilice la descripción de Open Directory Project (ODP) para el sitio.
    <meta name="google-site-verification" content="abc123xyz">: Este ejemplo especifica un token de verificación específico para verificar la propiedad del sitio en Google Search Console.
    <meta name="msvalidate.01" content="abc123xyz">: Este ejemplo especifica un token de verificación específico para verificar la propiedad del sitio en Bing Webmaster Tools.
    <meta name="alexaVerifyID" content="abc123xyz">: Este ejemplo especifica un token de verificación específico para verificar la propiedad del sitio en Alexa.
    <meta name="p:domain_verify" content="abc123xyz">: Este ejemplo especifica un token de verificación específico para verificar la propiedad del sitio en Pinterest.
    con verificacion de propiedad tengo acceso a las estadisticas de busqueda-->
    <title>LJL CONSTRUCCIONES</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="view/js/jquery.js"></script>
    <script src="view/js/js.js"></script>
    <script src="view/js/notify.js"></script>
    <script src="view/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js?v=1.1" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js?v=1.1" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css?v=1.1" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="view/css/css.css?v=1.1" rel="stylesheet">
    <script>
        $(document).ready(function(){
            $('.carousel').carousel('cycle');
            $(".goog-te-gadget-icon").remove();
            $(".goog-te-gadget-simple").css({"background":"none","border":"none"});
        });
    </script>
</head>
<body lang="en" translate="yes">
    <div class="jumbotrom">
        <?php
            $sql="SELECT * FROM our_company WHERE c_name LIKE 'jumbotrom%'";
            $objjm=$model->capturar($sql);
            $sql="SELECT * FROM our_company_file WHERE id_our=".$objjm[0]['id'];
            $imgjt=$model->capturar($sql);
            $crs='<div id="carouselExampleSlidesOnly" class="carousel slide col-12" data-ride="carousel" style="position:absolute; width:100%; height:100%;" data-interval="1000">
                <div class="carousel-inner" style=" height:100%; ">';
                    for($i=0;$i<count($imgjt);$i++){
                        $crs=$crs.'<div class="carousel-item';
                        if($i==0){$crs=$crs.' active ';}
                        $crs=$crs.'" style="postion:absolute; width:100%; height:100%;">
                            <img src="data:image/jpeg;base64,'.base64_encode($imgjt[$i]["our_file"]).'"  style="position:absolute; with:100%; height:100%;opacity:0.6;" class="col-12"/>
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="lead text-light">'.$imgjt[$i]["descripcion"].'</h2>
                            </div>
                        </div>';
                    }
                $crs=$crs.'</div>
                <center>
                    <h1 class="my-2">'.$objjm[0]["c_description"].'</h1>
                </center>';
            $crs=$crs.'</div>';
            print($crs);
        ?>
        <img src="view/img/logo_sin_fondo_2.png" style='position:absolute; z-index:2; top:30%; left:10.5%; width:32%'/>
    </div>
    <nav class="navbar navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="google_translate_element"></div>
        <script type="text/javascript">
            function googleTranslateElementInit() {
	            new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'es,ca,eu,gl,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="menu col-12 row">
                <li class="col-12 col-sm-6 col-md-3 nav-item">
                    <a href="index.php" target="_self">¿Quienes Somos?</a>
                </li>
                <li class="col-12 col-sm-6 col-md-3 nav-item">
                    <a href="categorias.php" target="_self">Nuestros Servicios</a>
                </li>
                <li class="col-12 col-sm-6 col-md-3 nav-item">
                    <a href="contacto_empresarial.php" target="_self">Panel de Cliente</a>
                </li>
                <li class="col-12 col-sm-6 col-md-3 nav-item">
                    <a href="proyectos.php" target="_self">Proyectos Atendidos</a>
                </li>
            </ul>
        </div>
    </nav>
<script>
    $(document).ready(function(){
        $(".navbar-toggler").click(function(){
            $("#navbarNav").slideToggle();
        });
    });
</script>

<div style="position:absolute; top:110%; width:100%;">
    <div class="container">
        <center>
            <section>
                <div class="row my-4">
                    <h2 lang="en" translate="yes" style="color:orange;">Nuestro Equipo</h2>
                <?php 
                    $sql = "SELECT id_personal, name, position, photo, ingles FROM $model->tb_personal";
                    $data = $model->capturar($sql);
                    foreach ($data as $clave => $valor){
                        $sql="SELECT * FROM $model->tb_personal_contacto WHERE id_personal=".$valor['id_personal'];
                        $contacto = $model->capturar($sql);
                        $sql="SELECT * FROM $model->tb_personal_experiencias WHERE id_personal=".$valor['id_personal'];
                        $experiencia = $model->capturar($sql);
                        $sql="SELECT * FROM $model->tb_personal_project WHERE id_personal=".$valor['id_personal'];
                        $proyectos = $model->capturar($sql);
                        $sql="SELECT * FROM $model->tb_personal_estudios WHERE id_personal=".$valor['id_personal'];
                        $estudios = $model->capturar($sql);
                        $idp=$valor["id_personal"];
                        $cadena='<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12 d-inline-block my-3" style="float:left;" onclick="mostrar_personal('.$idp.')">
                            <div class="container">
                                <div class="card" style="cursor:pointer" >
                                    <div class="card-body">
                                        <h5 id="nombre'.$idp.'" class="card-title">'.$valor["name"].'</h5>
                                        <h6 id="posicion'.$idp.'" class="card-subtitle mb-2 text-muted">'.$valor["position"].'</h6>
                                    </div>
                                </div>
                                <table class="table table-responsive table-striped table-hover table-sm" id="t_estudios'.$idp.'" style="display:none">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Instituto</th>
                                            <th>Grado</th>
                                            <th>Año</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        for($i=0;$i<count($estudios);$i++){
                                            $cadena=$cadena.'<tr>
                                            <td style="font-size:16px">'.$estudios[$i]['instituto'].'</td>
                                            <td style="font-size:16px">'.$estudios[$i]['grado'].'</td>
                                            <td style="font-size:16px">'.$estudios[$i]['anno'].'</td>
                                            </tr>';
                                        }
                                    $cadena=$cadena.'</tbody>
                                </table>
                                <dl style="display:none" id="contacto'.$idp.'" >';
                                    for($i=0;$i<count($contacto);$i++){
                                        $cadena=$cadena.'<dt style="font-size:16px">'.$contacto[$i]['type'].'</dt><dd><a style="font-size:16px; color:black"';
                                        if(strpos($contacto[$i]['type'],'Movil')!==false){
                                            $cadena=$cadena.'href="tel:'.$contacto[$i]['content'].'"';
                                        }
                                        if(strpos($contacto[$i]['type'],'Email')!==false){
                                            $cadena=$cadena.'href="mailto:'.$contacto[$i]['content'].'"';
                                        }
                                        $cadena=$cadena.'>'.$contacto[$i]['content'].'</a></dd>';
                                    }
                                $cadena=$cadena.'</dl>
                                <table class="table table-responsive table-striped table-hover table-sm" id="t_experiencia'.$idp.'" style="display:none">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Institución</th>
                                            <th>Cargo</th>
                                            <th>Area</th>
                                            <th>Años</th>
                                            <th>Logros</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    for($i=0;$i<count($experiencia);$i++){
                                        $cadena=$cadena.'<tr><td style="font-size:16px">'.$experiencia[$i]['empresa'].'</td>
                                        <td style="font-size:16px">'.$experiencia[$i]['cargo'].'</td>
                                        <td style="font-size:16px">'.$experiencia[$i]['area'].'</td>
                                        <td style="font-size:16px">'.$experiencia[$i]['annos'].'</td>
                                        <td style="font-size:16px">'.$experiencia[$i]['logros'].'</td></tr>';
                                    }
                                    $cadena=$cadena.'</tbody>
                                </table>
                                <table class="table table-responsive table-striped table-hover table-sm" id="t_proyectos'.$idp.'" style="display:none">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Proyecto</th>
                                            <th>Descripcion</th>
                                            <th>Participacion</th>
                                            <th>Logros</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        for($i=0;$i<count($proyectos);$i++){
                                            $cadena=$cadena.'<tr>
                                            <td style="font-size:16px">'.$proyectos[$i]['cliente'].'</td>
                                            <td style="font-size:16px">'.$proyectos[$i]['nombre'].'</td>
                                            <td style="font-size:16px">'.$proyectos[$i]['descripcion'].'</td>
                                            <td style="font-size:16px">'.$proyectos[$i]['participacion'].'</td>
                                            <td style="font-size:16px">'.$proyectos[$i]['logros'].'</td>
                                            </tr>';
                                        }
                                    $cadena=$cadena.'</tbody>
                                </table>
                            </div>
                        </div>';
                        print($cadena);
                    }
                ?>
                </div>
            <?php 
                $sql="SELECT * FROM $model->tb_company WHERE c_name LIKE 'misi%'";
                $data=$model->capturar($sql);
                if(count($data)>0){
                    $sql = "SELECT * FROM $model->tb_our_file WHERE id_our =". $data[0]['id'];
                    $m_ima="";
                    $img=$model->capturar($sql);
                    for($i=0;$i<count($img);$i++){
                        $m_ima=$m_ima.'<div class="col-xxl-6 col-xl-6 col-lg-6 col-lg-6 col-sm-12 carousel-item';
                        if($i==0){$m_ima=$m_ima.' active ';} 
                        $m_ima=$m_ima.'"><img src="data:image/jpeg;base64,'.base64_encode($img[$i]["our_file"]).'" style="height:220px"><label>'.$img[$i]["descripcion"].'</label></div>';
                    }
                ?>
                    <div class="my-4">
                        <div class="row">
                            <h2 style="color:orange">Misión</h2>
                            <?php if($data[0]['mostrar_file']=="si"){ ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12" style="text-align:justify; font-size:18px; color:#336;  line-height:28px">
                            <?php }else{?>
                                <div class="col-12" style="text-align:justify; font-size:18px; color:#336;  line-height:28px">
                            <?php }?>
                                <?php print($data[0]['c_description']);?>
                            </div>
                            <?php if($data[0]['mostrar_file']=="si"){ ?>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12">
                                <div id="carouselExampleSlidesOnly" class="carousel slide col-11" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php echo $m_ima?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
            ?>
            <?php
                $sql="SELECT * FROM $model->tb_company WHERE c_name LIKE 'visi%'";
                $data=$model->capturar($sql);
                if(count($data)>0){
                    if($data[0]['mostrar_file']=="si"){
                        $sql = "SELECT * FROM $model->tb_our_file WHERE id_our =". $data[0]['id'];
                        $vima="";
                        $img=$model->capturar($sql);
                        for($i=0;$i<count($img);$i++){
                            $vima=$vima.'<div class="col-xxl-6 col-xl-6 col-lg-6 col-lg-6 col-sm-12 carousel-item';
                            if ($i==0){$vima=$vima.' active ';}
                            $vima=$vima.'">
                            <img src="data:image/jpeg;base64,'.base64_encode($img[$i]["our_file"]).'" style="height:220px">
                            <label>'.$img[$i]["descripcion"].'</label>
                            </div>';
                        }
                    }?>
                    <div class="my-4">
                        <div class="row">
                            <h2 style="color:orange">Visión</h2>
                            <?php if($data[0]['mostrar_file']=="si"){ ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12" style="text-align:justify; font-size:18px; color:#336;  line-height:28px">
                            <?php }else{?>
                                <div class="col-12" style="text-align:justify; font-size:18px; color:#336;  line-height:28px">
                            <?php }
                             print($data[0]['c_description']);
                            ?>
                            </div>
                            <?php if($data[0]['mostrar_file']=="si"){ ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide col-12" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php echo $vima?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
            ?>
            <?php
                $sql="SELECT * FROM $model->tb_company WHERE c_name = 'historia'";
                $data=$model->capturar($sql);
                if(count($data)>0){
                    $sql = "SELECT * FROM $model->tb_our_file WHERE id_our =". $data[0]['id'];
                    $h_ima="";
                    $img=$model->capturar($sql);
                    for($i=0;$i<count($img);$i++){
                        
                        $h_ima=$h_ima.'<div class="col-xxl-4 col-xl-4 col-lg-5 col-lg-5 col-sm-10 carousel-item';
                        if($i==0){$h_ima=$h_ima.' active ';}
                        $h_ima=$h_ima.'"><img src="data:image/jpeg;base64,'.base64_encode($img[$i]["our_file"]).'" style="height:220px"><br/><label>'.$img[$i]["descripcion"].'</label></div>';
                    }?>
                    <div class=" my-4">
                        <div class="row">
                            <h2 style="color:orange">Nuestra Historía</h2>
                            <?php if($data[0]['mostrar_file']=="si"){ ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12" style="text-align:justify; font-size:18px; color:#336;  line-height:28px">
                            <?php }else{?>
                                <div class="col-12" style="text-align:justify; font-size:18px; color:#336;  line-height:28px">
                            <?php }
                                print($data[0]['c_description']);?>
                            </div>
                            <?php if($data[0]['mostrar_file']=="si"){ ?>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12">
                                <div id="carouselExampleSlidesOnly" class="carousel slide col-11" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php echo $h_ima?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
            ?>
            <?php
                $sql="SELECT * FROM $model->tb_company WHERE c_name LIKE 'valor%'";
                $data=$cone->prepare($sql);
                $data->execute();
                $data=$data->fetchAll(PDO::FETCH_ASSOC);
                if(count($data)>0){?>
                    <div class="my-4">
                        <div class="row">
                            <h2 style="color:orange;">Principios Empresariales</h2>
                            <div class="col-12">
                                <dl>
                                    <?php for($i=0;$i<count($data);$i++){ ?>
                                        <dt class="col-12 mt-4 mb-2" style="font-size:22px; color:#336; text-align:justify;">
                                            <?php 
                                                $def = explode("_",$data[$i]['c_name']);
                                                print($def[1]);
                                            ?>
                                        <dd class="col-12" style="text-align:justify; font-size:18px; color:#336;">
                                            <?php 
                                                print($data[$i]['c_description']);
                                    } ?>
                                </dl>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
        </section>
        </center>
    </div>
</div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title col-11" style="text-align:center">Ficha Personal</h4>
                    <button type="button" class="close" id="cm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row overflow-auto">
                            <!--<div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-sm-12" id="mod-photo"></div>-->
                            <div class="form-group col-xxl-8 col-xl-8 col-lg-8 col-sm-12">
                                <div id='md-nombre' class='lead' style="font-size:18px;"></div>
                                <div id='md-cargo' class='lead' style="font-size:18px;"></div>
                                <div id='md-ingles' class='lead' style="font-size:18px;"></div>
                                <div id='md-contacto' class='lead' style="font-size:18px;"></div>
                            </div>
                        </div>
                        <div class="tabset">
                            <!-- Tab 2 -->
                            <input type="radio" name="tabset" id="tab1" aria-controls="estudio">
                            <label for="tab1">Estudios</label>
                            <!-- Tab 3 -->
                            <input type="radio" name="tabset" id="tab2" aria-controls="experiencias">
                            <label for="tab2">Experiencia</label>
                            <!-- Tab 4 -->
                            <input type="radio" name="tabset" id="tab3" aria-controls="proyectos">
                            <label for="tab3">Proyectos</label>
                            <div class="tab-panels">
                                <div class="tab-panel active overflow-auto" id='panel_estudios'></div>
                                <div class="tab-panel overflow-auto" id='panel_experiencia'></div>
                                <div class="tab-panel overflow-auto" id='panel_proyecto'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
