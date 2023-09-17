<?php
include_once('bd_show.php');
include_once('mprincipal.php');
$cone = new Conexion_lct;
$model = new ProgramModel;
$sql="SELECT pr.*, cat.ct_name FROM $model->tb_projects AS pr LEFT JOIN $model->tb_category AS cat ON cat.id_category = pr.pr_category WHERE pr.id_projects=".$_POST['id'];
$proyecto = $model->capturar($sql);
$sql="SELECT * FROM $model->tb_stage WHERE id_project=".$_POST['id'];
$stages = $model->capturar($sql);
//print_r($proyecto);
//print_r($stages);
//print_r($files);
    $resu='<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">'.$proyecto[0]['pr_name'].'</h5>
                <button type="button" class="close" onclick="cerrar_modal()" id="cm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Dirección: '.$proyecto[0]['pr_direction'].'</label>
                        </div>
                        <div class="form-group col-xxl-4 col-xl-4 col-lg-6 col-sm-12">
                            <label>Fecha de Inicio: '.$proyecto[0]['pr_start_date'].'</label>
                        </div>
                        <div class="form-group col-xxl-4 col-xl-4 col-lg-6 col-sm-12">         
                            <label>Fecha de Entrega: '.$proyecto[0]['pr_stop_date'].'</label>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-sm-12">
                            <label>Total Etapas: '.$proyecto[0]['pr_stage_number'].'</label>
                        </div>
                        <div class="form-group col-xxl-4 col-xl-4 col-lg-6 col-sm-12">
                            <label>Etapa actual:'.$proyecto[0]['pr_current_stage'].' ('.$proyecto[0]['pr_status'].')</label>
                        </div>
                        <div class="form-group col-12">
                            <label id="category">Tipo de Trabajo: '.$proyecto[0]['ct_name'].' '.$proyecto[0]['pr_description'].'</label>
                        </div>
                        <div class="tabset">';
                            for($i=0;$i<count($stages);$i++){
                                $resu=$resu.'<input type="radio" name="tabset" id="tab'.$i.'" aria-controls="estudio">
                                <label for="tab'.$i.'">'.$stages[$i]["name_stage"].'</label>';
                            }
                            $resu=$resu.'<div class="tab-panels">';
                            for($i=0;$i<count($stages);$i++){
                                $resu=$resu.'<div class="tab-panel">
                                    <div class="container">';
                                        if(!empty(trim($stages[$i]['name_stage']))){
                                            $resu=$resu.'<h6 class="col-12">'.$stages[$i]['name_stage'].'</h6>';
                                        }if(!empty(trim($stages[$i]['description_stage']))){
                                            $resu=$resu.'<label class="col-12">Descripción:'.$stages[$i]['description_stage'].'</label>';
                                        }if(!empty(trim($stages[$i]['condition_stage']))){
                                            $resu=$resu.'<label class="col-12">Condiciones Previas:'.$stages[$i]['condition_stage'].'</label>';
                                        }
                                        $resu=$resu.'<div id="fotografia_proyecto" class="row">
                                            <div id="carouselExampleSlidesOnly" class="carousel slide
                                            col-12 carousel-dark" data-ride="carousel">
                                                <!--<ol class="carousel-indicators" style="display:block">-->';
                                                $img='SELECT * FROM '.$model->tb_projects_file.' WHERE id_project='.$_POST['id'].' AND id_estage = '.$stages[$i]["n_stage"];
                                                $datos=$model->capturar($img);
                                                $ndi=count($datos);
                                                for($ii=0; $ii < $ndi ; $ii++){
                                                    /*$resu=$resu."<li data-galery_sh=\"$i\" data-itemmostrar=\"$ii\" style=\"z-index:2; float:left; cursor:pointer\" class=\"text-light bg-dark";
                                                    if($ii==0){$resu=$resu." active";}
                                                    $resu=$resu."\" onclick=\"mostrar_foto_sh(this)\" >&nbsp;&nbsp;-$ii-&nbsp;&nbsp;</li>";*/
                                                }
                                                $resu=$resu.'<!--</ol>-->
                                                <input type="hidden" value="0" id="car_sh'.$i.'"/>
                                                <div class="carousel-inner" id="caro_sh_'.$i.'_'.$ii.'"\>';
                                                for($ii=0;$ii<$ndi;$ii++){
                                                    $resu=$resu.'<div style="text-align:center; background:#ccc;" class="carousel-item galery_sh'.$i.' galeryitem_sh'.$i.'_'.$ii; 
                                                    if($ii==0){$resu=$resu.' active "';}else{$resu=$resu.'"\\';}
                                                    $resu=$resu.'>
                                                    <img style="height:450px" src="data:image/jpeg;base64,'.base64_encode($datos[$ii]["pj_file"]).'" alt="imagen1">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <p class="lead text-light">'.$datos[$ii]["pj_description"].'</p>
                                                    </div>
                                                </div>';
                                                }
                                                $resu=$resu.'</div>
                                                <a class="carousel-control-prev" data-galery_sh="'.$i.'" data-limite="'.$ndi.'" href="#" role="button" onclick="imagenanterior_sh2(this)"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
                                                <a class="carousel-control-next" onclick="imagensiguiente_sh2(this)" data-galery_sh="'.$i.'" data-limite='.$ndi.' href="#" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                            $resu=$resu.'</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    print($resu);