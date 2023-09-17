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
                        <div id="fotografia_proyecto" class="row">
                            <div id="carouselExampleSlidesOnly" style="background:#999;" class="carousel slide col-12" data-ride="carousel">
                                <input type="hidden" value="0" id="car_sh"/>
                                <div class="carousel-inner" id="caro_sh"\><center>';
                                    $sgl="SELECT * FROM projects_file WHERE id_project=".$_POST['id'];
                                    $datos = $model->capturar($sgl);
                                    $ndi=count($datos);
                                    for($ii=0;$ii<$ndi;$ii++){
                                        $resu=$resu.'<div class="carousel-item galeryitem_sh'.$ii;
                                        if($ii==0){$resu=$resu.' active ';}
                                        $resu=$resu.'"\\><img class="d-block" src="data:image/jpeg;base64,'.base64_encode($datos[$ii]["pj_file"]).'" alt="imagen'.$ii.'" style="height:430px">
                                        </div>';
                                    }
                                $resu=$resu.'</center></div>
                                <a class="carousel-control-prev" data-limite="'.$ndi.'" href="#" role="button" onclick="imagenanterior_sh(this)"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
                                <a class="carousel-control-next" onclick="imagensiguiente_sh(this)" data-galery_sh="'.$ii.'" data-limite='.$ndi.' href="#" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
print($resu);