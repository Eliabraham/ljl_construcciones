<?php
    include_once('model/bd_show.php');
    include_once('model/mprincipal.php');
    $cone = new Conexion_lct;
    $model = new ProgramModel;
    $sql="SELECT * FROM $model->tb_company WHERE (c_name LIKE 'contacto%' and NOT c_name LIKE '%Direccion%')";
    $contacto = $model->capturar($sql);
    $sql="SELECT * FROM $model->tb_company WHERE c_name LIKE '%Direccion%'";
    $direccion=$model->capturar($sql);
    $sql="SELECT * FROM $model->tb_company WHERE c_name LIKE 'politica%'";
    $politicas=$model->capturar($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="LJL CONSTRUCCIONES somos una empresa dedicada a la ciencia y arte de la construcción, contamos con experiencia en el area de viviendas y edificios comerciales. Ofrecemos servicios de construcción de alta calidad y proyectos a medida para satisfacer las necesidades y deseos de nuestros clientes. Trabajamos con un equipo altamente capacitado y utilizamos materiales de la mejor calidad para garantizar la durabilidad y seguridad de nuestras construcciones. Contáctanos para obtener más información sobre nuestros servicios o para solicitar un presupuesto.">
        <meta name="keywords" content="jlj,ljl, jljconstrucciones, ljlconstrucciones, construcción, paisajismo, urbanismo, obra civil, concreto, corte de concreto, ampliación de estructura, reparación de estructura, piscinas, quinchos, remodelación, techado, constructora Santiago de Chile,constructora Viña del Mar, constructora chilena, edificación, proyectos de construcción, materiales de construcción, arquitectura, ingeniería, empresas de construcción en Santiago">
        <meta name="robots" content="index, follow">
        <meta property="og:title" content="JlJ Construcciones - Especialistas en construcción y remodelaciones">
        <meta property="og:description" content="JlJ Construcciones es una empresa especializada en construcción y remodelaciones, ofrecemos servicios de alta calidad y profesionalismo. Contamos con un equipo de arquitectos y ingenieros altamente capacitados para brindarle soluciones en construcción y diseño para su hogar o negocio. ">
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
        con verificacion de propiedad tengo acceso a las estadisticas de busqueda-->        <title>LJL CONSTRUCCIONES</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <script src="view/js/jquery.js"></script>
        <script src="view/js/js.js"></script>
        <script src="view/js/notify.js"></script>
        <script src="view/js/index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="view/css/css.css?v=1.1" rel="stylesheet">
        <script>
            $(document).ready(function(){
                $('.carousel').carousel('cycle');
                $('.carousel').on({
                    'mouseout':function(){$('.carousel').carousel('cycle');},
                    'mouseenter':function(){$('.carousel').carousel('cycle');},
                });
            })
            function guardar_fc(){
                formdata=new FormData($('#formUpload_solicitudes')[0]);
                $.ajax({
                    type: "POST",
                    url: "model/solicitud.php",
                    data: formdata,
                    contentType: false,
                    processData: false,
                }).done(
                    function(respuesta){
                        $.notify(respuesta, "info");
                    }
                ).fail(function(jqXHR, textStatus){
                    formato.error_ajax(jqXHR, textStatus);
                });
            }
            function imagencliente(event, querySelector){
                const input = event.target;
                $(`#${querySelector}`).html("");
                for(i=0;i<input.files.length;i++){
                    file = input.files[i];
                    objectURL = URL.createObjectURL(file);
                    ima=`<div class="col-xxl-4 col-xl-4 col-lg-6 col-sm-12 row">
	            	<img src="${objectURL}"></img>
                    <input type="search" placeholder="DESCRIPCION DE FOTOGRAFIA" id="description_file_${i}" name="description_file_${i}" class=" form-control form-control-sm"/>
	            	</div>`;
                	$(`#${querySelector}`).append(ima);
                }
            }
        </script>
    </head>
    <body>
    <div class="jumbotrom">
        <?php
            $sql="SELECT * FROM our_company WHERE c_name LIKE 'jumbotrom%'";
            $objjm=$model->capturar($sql);
            $sql="SELECT * FROM our_company_file WHERE id_our=".$objjm[0]['id'];
            $imgjt=$model->capturar($sql);
            $crs='<div id="carouselExampleSlidesOnly" class="carousel slide col-12" data-ride="carousel" style="position:absolute; width:100%; height:100%;">
                <div class="carousel-inner" style="position:absolute; width:100%; height:100%; ">';
                    for($i=0;$i<count($imgjt);$i++){
                        $crs=$crs.'<div class="carousel-item';
                        if($i==0){$crs=$crs.' active';}
                        $crs=$crs.'" style="postion:absolute; width:100%; height:100%;"><img src="data:image/jpeg;base64,'.base64_encode($imgjt[$i]["our_file"]).'"  style="position:absolute; with:100%; height:100%;opacity:0.6;" class="col-12"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="lead text-light">'.$imgjt[$i]["descripcion"].'</h2>
                        </div>
                        </div>';
                    }
                $crs=$crs.'</div>';
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
    <div style="position:absolute; top:100%; width:100%;">
        <div class="container">
            <section class="row">
                <div class="m-3 p-3">
                    <h3 class="my-3">
                        Visitanos en:
                        <?php print ($direccion[0]['c_description']);?>
                    </h3>
                    <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=avenida%20providencia%201650%20santiago&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width:100%; height: 300px;">
                    </iframe>
                    <a href="https://123movies-to.org"></a>
                    <br>
                    <a href="https://www.embedgooglemap.net"></a>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12">
                    <form action="#" method="post" enctype="multipart/form-data" id="formUpload_solicitudes">
                        <center><h3>Escribenos:</h3></center>
                        <div class="container">
                            <div class="form-group">
                                <label for="user">Nombre:</label>
                                <input type="search" maxlength="50" autocomplete="off" name="valnombre" id="nombre" class="form-control form-control-sm" require/>
                            </div>
                            <div class="form-group">
                                <label for="user">Representante de:</label>
                                <input type="search" maxlength="50" autocomplete="off" name="valrepresentado" id="representado" class="form-control form-control-sm dpersonal requerido"/>
                            </div>
                            <div class="form-group">
                                <label for="user">Telefono:</label>
                                <input type="search" maxlength="50" autocomplete="off" name="valtelefono" id="telefono" class="form-control form-control-sm dpersonal requerido"/>
                            </div>
                            <div class="form-group">
                                <label for="user">Email:</label>
                                <input type="search" maxlength="50" autocomplete="off" name="valemail" id="email" class="form-control form-control-sm dpersonal requerido"/>
                            </div>
                            <div class="form-group">
                                <label for="user">Asunto o solicitud</label>
                                <textarea name="valasunto" id="asunto" class="form-control form-control-sm dpersonal requerido" rows="7"></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="user">Fotografias</label>
                                <input type="file" name="fotos" id="fotos" onchange="imagencliente(event, 'img_cliente')" accept="image/*" class="btn btn-success form-control form-control-sm"/>
                                <div id="img_cliente"></div>
                            </div>
                            <center>
                                <button type="button" class="btn btn-primary col-6 my-4" onclick="guardar_fc()">Enviar</button>
                            </center>
                        </div>
                    </form>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12">
                    <center>
                        <h3>Nuestros Contactos:</h3>
                        <dl>
                            <?php for($i=0;$i<count($contacto);$i++){ ?>
                                <dt class="col-10" style="padding-top:12px;">
                                    <?php 
                                        $def = explode("_",$contacto[$i]['c_name']);
                                        print("<h4>".$def[1]."</h4>");
                                    ?>
                                <dd class="col-10" style="text-align:justify padding-bottom:12px;">
                                    <?php 
                                        if(strpos($def[1],'Movil')!==false){ 
                                            print("<h5><a style='text-decoration:none;
                                            color:#336;' href='tel:".$contacto[$i]['c_description']."'>LLamanos ".$contacto[$i]['c_description']."</a>
                                            <a style='text-decoration:none;
                                            color:#336;' class='whatsappLink mobile' href='whatsapp://send?text=indiquenos brebemente su necesidad &phone=".$contacto[$i]['c_description']."&abid=".$contacto[$i]['c_description']."'>Whatsap</a></h5>");
                                        }
                                        if(strpos($def[1],'Email')!==false){
                                            print("<h4><a style='text-decoration:none;
                                            color:#336;' href='mailto:".$contacto[$i]['c_description']."'>".$contacto[$i]['c_description']."</a></h4>");
                                        }?>
                                    <?php } ?>
                        </dl>
                    </center>
                </div>
                <div class="col-12">
                    <div class="container">
                        <dl>
                            <?php
                                for($i=0;$i<count($politicas);$i++){ 
                            ?>
                                    <dt class="col-12" style="padding-top:12px;">
                                    <?php 
                                        $def = explode("_",$politicas[$i]['c_name']);
                                        print("<h4>".$def[1]."</h4>");
                                    ?>
                                    <dd class="col-12" style="text-align:justify; padding-bottom:12px;">
                                    <?php 
                                        print("<h4>".$politicas[$i]['c_description']."</h4>");
                                    }
                                ?>
                        </dl>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </body>
</html>