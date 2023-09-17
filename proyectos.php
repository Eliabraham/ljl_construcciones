<?php
    include_once('model/bd_show.php');
    include_once('model/mprincipal.php');
    $cone = new Conexion_lct;
    $model = new ProgramModel;
    $sql="SELECT id_projects, pr_name, pr_direction, pr_start_date, pr_stop_date FROM $model->tb_projects";
    if(!empty($_POST['mcategoria'])){
        $sql=$sql." WHERE pr_category=".$_POST['mcategoria'];
        $sgl="SELECT * FROM tb_category WHERE id_category=".$_POST['mcategoria'];
        $categoria = $model->capturar($sgl);
    }
    $data = $model->capturar($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LJL CONSTRUCCIONES somos una empresa dedicada a la ciencia y arte de la construcción, contamos con experiencia en el area de viviendas y edificios comerciales. Ofrecemos servicios de construcción de alta calidad y proyectos a medida para satisfacer las necesidades y deseos de nuestros clientes. Trabajamos con un equipo altamente capacitado y utilizamos materiales de la mejor calidad para garantizar la durabilidad y seguridad de nuestras construcciones. Contáctanos para obtener más información sobre nuestros servicios o para solicitar un presupuesto.">
    <meta name="keywords" content="jlj, ljl, jljconstrucciones, ljlconstrucciones, construcción, paisajismo, urbanismo, obra civil, concreto, corte de concreto, ampliación de estructura, reparación de estructura, piscinas, quinchos, remodelación, techado, constructora Santiago de Chile,constructora Viña del Mar, constructora chilena, edificación, proyectos de construcción, materiales de construcción, arquitectura, ingeniería, empresas de construcción en Santiago">
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
    <script >
        function mostrar_foto(esp){
            let galeria=$(esp).data('galery');
            let item = $(esp).data('itemmostrar');
            t=$(`.galery${galeria}`);
            $(t).removeClass('active');
            $(`.galeryitem${galeria}_${item}`).addClass('active');
            $(`#car${galeria}`).val(item);
        }
        function mostrar_foto_sh(esp){
            let galeria=$(esp).data('galery_sh');
            let item = $(esp).data('itemmostrar');
            t=$(`.galery_sh${galeria}`);
            $(t).removeClass('active');
            $(`.galeryitem_sh${galeria}_${item}`).addClass('active');
            $(`#car_sh${galeria}`).val(item);
        }
        function imagenanterior(esp){
            let galeria=$(esp).data('galery');
            let limite=$(esp).data('limite');
            let actual=$(`#car${galeria}`).val();
            let mostrar=parseInt(actual)-1;
            if(mostrar==-1){mostrar=limite-1;}
            $(`.galery${galeria}`).removeClass('active');
            $(`.galeryitem${galeria}_${mostrar}`).addClass('active');
            $(`#car${galeria}`).val(mostrar);
        }
        function imagenanterior_sh(esp){
            let limite=$(esp).data('limite');
            let actual=$(`#car_sh`).val();
            let mostrar=parseInt(actual)-1;
            if(mostrar==-1){mostrar=limite-1;}
            $(`.galeryitem_sh${actual}`).removeClass('active');
            $(`.galeryitem_sh${mostrar}`).addClass('active');
            $(`#car_sh`).val(mostrar);
        }
        function imagensiguiente(esp){
            let galeria=$(esp).data('galery');
            let limite=$(esp).data('limite');
            let actual=$(`#car${galeria}`).val();
            let mostrar=parseInt(actual)+1;
            if(mostrar==limite){mostrar=0;}
            $(`.galery${galeria}`).removeClass('active');
            $(`.galeryitem${galeria}_${mostrar}`).addClass('active');
            $(`#car${galeria}`).val(mostrar);
        }
        function imagensiguiente_sh(esp){
            let limite=$(esp).data('limite');
            let actual=$(`#car_sh`).val();
            let mostrar=parseInt(actual)+1;
            if(mostrar==limite){mostrar=0;}
            $(`.galeryitem_sh${actual}`).removeClass('active');
            $(`.galeryitem_sh${mostrar}`).addClass('active');
            $(`#car_sh`).val(mostrar);
        }
        function cerrar_modal(){
            $('#myModal').modal('toggle');
        }
        function mostrar_proyecto(pr){
            $.ajax({
                type: "POST",
                url: `model/proyecto.php`,
                data:{id: pr},
            })
            .done(function(resp){
                $("#myModal").html(resp);
                $('#myModal').modal('show');
            })
            .fail(function(jqXHR, textStatus){
                formato.error_ajax(jqXHR, textStatus);
            })
        }
        function imagenanterior_sh2(esp){
            let limite=$(esp).data('limite');
            let galeria=$(esp).data('galery_sh');
            let actual=$(`#car_sh${galeria}`).val();
            let mostrar=parseInt(actual)-1;
            if(mostrar==-1){mostrar=limite-1;}
            $(`.galery_sh${galeria}`).removeClass('active');
            $(`.galeryitem_sh${galeria}_${mostrar}`).addClass('active');
            $(`#car_sh${galeria}`).val(mostrar);
        }
        function imagensiguiente_sh2(esp){
            let limite=$(esp).data('limite');
            let galeria=$(esp).data('galery_sh');
            let actual=$(`#car_sh${galeria}`).val();
            let mostrar=parseInt(actual)+1;
            if(mostrar==limite){mostrar=0;}
            $(`.galery_sh${galeria}`).removeClass('active');
            $(`.galeryitem_sh${galeria}_${mostrar}`).addClass('active');
            $(`#car_sh${galeria}`).val(mostrar);
        }

        $(document).ready(function(){
            $('.carousel').carousel('cycle');
            $('.carousel').on({
                'mouseout':function(){$('.carousel').carousel('cycle');},
                'mouseenter':function(){$('.carousel').carousel('cycle');},
            });
        })
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
            <?php 
            if(!empty($_POST['mcategoria'])){?>
            <div class="row">
                <?php
                $ph='
                <div class="container row">
                    <div class="my-5 col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">
                        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-dark" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" style="height:280px; border-radius:20px" src="data:image/jpeg;base64,'.base64_encode($categoria[0]["image_one"]).'" alt="imagen1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="height:280px; border-radius:20px" src="data:image/jpeg;base64,'.base64_encode($categoria[0]["image_two"]).'" alt="imagen1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-5  col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12 text-justify" style="height:280px; border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title"><b>'.$categoria[0]["ct_name"].'</b></h5>
                            <h6 style="text-align:justify" class="lead">'.$categoria[0]["ct_description"].'</h6>
                        </div>
                    </div>
                    <center><a href="categorias.php" class="lead"/><b>volver</b></a></center>
                </div>';
                print($ph);
                ?>
            </div>
            <?php 
            }
            print("<h3 class='my-4'>Proyectos realizados: ".count($data)."</h3>");
                for($i=0;$i<count($data);$i++){
                $idp=$data[$i]['id_projects'];
                $sgl="SELECT pj_file FROM $model->tb_projects_file WHERE id_project = $idp order by id_file desc limit 3";
                $img=$model->capturar($sgl);
                $impri="<div class='col-xxl-4 col-xl-4 col-lg-6 col-sm-12 d-inline-block my-3' style='height:480px; float:left;'>
                    <div class='container overflow:auto'>
                        <div class='row py-3' style='height:470px;'>
                            <center>
                                <h5 style='color:blue; text-transform: capitalize;'>".$data[$i]['pr_name']."</h5>
                                <div id=\"carouselExampleSlidesOnly\" class=\"carousel slide col-11\" data-ride=\"carousel\">
                                    <!--<ol class=\"carousel-indicators\">";
                                        $ndi=count($img);
                                        for($ii=0; $ii < $ndi ; $ii++){
                                            $impri=$impri."<li data-galery=\"$i\" data-itemmostrar=\"$ii\" style=\"z-index:2; color:#fff; font-size:18px; cursor:pointer\"";
                                            if($ii==0){$impri=$impri."class=\"active\"";}
                                            $impri=$impri." onclick=\"mostrar_foto(this)\">&nbsp;&nbsp;-$ii-&nbsp;&nbsp;</li>";
                                        }
                                    $impri=$impri."</ol>--><input type=\"hidden\" value='0' id='car$i'/>
                                    <div class=\"carousel-inner\" id=\"caro_".$i."_".$ii."\">";
                                        for($ii=0; $ii < count($img) ; $ii++){
                                            $impri=$impri."<div class=\"carousel-item galery$i galeryitem$i"."_"."$ii"; 
                                            if($ii==0){$impri=$impri." active \"";}else{$impri=$impri."\"";}
                                            $impri=$impri."><img class=\"d-block w-100\" style=\"height:275px; border-radius:20px\"  src=\"data:image/jpeg;base64,".base64_encode($img[$ii]["pj_file"])."\" alt=\"imagen\">
                                            </div>";
                                        }
                                    $impri=$impri."</div>
                                    <a class='carousel-control-prev' data-galery=\"$i\" data-limite='$ndi' href='#carouselExampleIndicators' role='button' data-slide='prev' onclick='imagenanterior(this)'>
                                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                    </a>
                                    <a class='carousel-control-next' onclick='imagensiguiente(this)' data-galery=\"$i\" data-limite='$ndi' href='#carouselExampleIndicators' role='button' data-slide='next'>
                                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                    </a>
                                </div>
                                <label class='col-12' style='font-size:16px; color:#336;'>".$data[$i]['pr_direction']."</label>
                                <label class='col-5' style='font-size:16px; color:#336;'>".$data[$i]['pr_start_date']."</label>
                                <label class='col-5' style='font-size:16px; color:#336;'>".$data[$i]['pr_stop_date']."</label>
                                <button class='btn btn-primary col-8' onclick='mostrar_proyecto(\"".$data[$i]['id_projects']."\")'>VER DETALLE</button>
                            </center>
                        </div>
                    </div>
                </div>";
                print($impri);
            }?>
        </section>
    </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal" aria-hidden="true">
    </div>
</body>
</html>