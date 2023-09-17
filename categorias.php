<?php
    include_once('model/bd_show.php');
    include_once('model/mprincipal.php');
    $cone = new Conexion_lct;
    $model = new ProgramModel;
    $sql = "SELECT * FROM $model->tb_category";
    $data=$model->capturar($sql);
    $cadena="";
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
    con verificacion de propiedad tengo acceso a las estadisticas de busqueda-->    <title>LJL CONSTRUCCIONES</title>
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
            });
        });
        function mostrar_proyectos(t){
            $("#mcategoria").val(t.name);
            $("#vincular").submit();
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
            <section>
                <div class="row">
                    <form action="proyectos.php" method="post" id="vincular">
                        <input type="hidden" name="mcategoria" id="mcategoria"/>
                    </form>
                    <h2 style="padding-top:20px; text-align:center">Ofrecemos Trabajos en las Siguientes Categorias</h2>
                    <?php
                        foreach ($data as $clave => $valor){
                            $cadena=$cadena.'<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-inline-block my-4" style="height:280px; float:left;">
                                <div class="container">
                                    <a href="#" onclick="mostrar_proyectos(this)" name="'.$valor["id_category"].'" class="row py-2 text-center" style="height:350px;cursor:pointer">
                                        <center>
                                            <div id="carouselExampleSlidesOnly" class="carousel slide col-12" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" style="height:220px; border-radius:20px" src="data:image/jpeg;base64,'.base64_encode($valor["image_one"]).'" alt="imagen1">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" style="height:220px; border-radius:20px" src="data:image/jpeg;base64,'.base64_encode($valor["image_two"]).'" alt="imagen1">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="col-12 my-3"  style="color:#336;">'.$valor["ct_name"].'</h3>
                                        </center>
                                    </a>
                                </div>
                            </div> '; 
                        }
                        print($cadena);
                    ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>