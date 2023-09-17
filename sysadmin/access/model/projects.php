<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Project extends ProgramModel
    {
        public function ingreso($datos){
            $this->informacion($datos);
            $sql="INSERT INTO $this->tb_projects (pr_name, pr_direction, pr_start_date, pr_stop_date, pr_description, pr_status, pr_show, pr_category, pr_stage_number, pr_current_stage) values ('$this->name','$this->direction','$this->start_date','$this->stop_date','$this->description','$this->status','$this->show','$this->category','$this->stage_number','$this->current_stage')";
            $this->insercion=$this->insertar($sql);
            print("SE HAN REALIZADO: ".$this->insercion[0]." INSERCIÓN");
        }
        public function listar_categorias(){
            $sql="SELECT id_category, ct_name FROM $this->tb_category";
            $data = $this->capturar($sql);
            print_r(json_encode($data));
        }
        public function listar_proyectos(){
            $sql    = "SELECT pro.*, cat.ct_name FROM $this->tb_projects AS pro LEFT JOIN $this->tb_category as cat on cat.id_category = pro.pr_category";
            $data   = $this->capturar($sql);
            $cadena = "";
            for($i=0;$i<count($data);$i++){
                $cadena = $cadena."<div class='col-xxl-4 col-xl-4 col-lg-6 col-lg-6 col-sm-12 d-inline-block my-3' style='height:350px; float:left;'>
                    <div class='container overflow:auto'>
                        <div class='row border border-primary py-3' style='height:350px;'>
                            <center>
                                <label class='col-12'>".$data[$i]['ct_name']." : ".$data[$i]['pr_name']."</label>
                                <label class='col-12'>".$data[$i]['pr_direction']."</label>
                                <label class='col-12'>".$data[$i]['pr_description']."</label>
                                <label class='col-5'>".$data[$i]['pr_start_date']."</label>
                                <label class='col-5'>".$data[$i]['pr_stop_date']."</label>
                                <label class='col-5'>".$data[$i]['pr_status']."</label>
                                <label class='col-3'>".$data[$i]['pr_stage_number']."</label>
                                <label class='col-3'>".$data[$i]['pr_current_stage']."</label>
                                <button name='".$data[$i]['id_projects']."' onclick='editar_proyecto(this)' class='btn btn-primary col-4'>Editar</button>
                                <button name='".$data[$i]['id_projects']."' onclick='eliminar_proyecto(this)' class='btn btn-danger col-3'>Eliminar</button>
                                <button name='".$data[$i]['id_projects']."' onclick='llamar_editar_etapas(this)' class='btn btn-primary col-4'>Etapas</button>
                            </center>
                        </div>
                    </div>
                </div>";
            }
            print_r($cadena);
        }
        public function eliminar_proyecto($id){
            try{
                $sql="DELETE FROM $this->tb_projects WHERE id_projects=".$id;
                if($this->insertar($sql)){
                    print("OPERACION REALIZADA SATISFACTORIAMENTE");
                }
            }catch (Exception $e){echo 'Caught exception: '.$e->getMessage()."\n";}
        }
        public function seleccionar_proyecto($id){
            $sql="SELECT * FROM $this->tb_projects WHERE id_projects=".$id;
            $data = $this->capturar($sql);
            if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
            $_SESSION['project_selected']=$id;
            print_r(json_encode($data));
        }
        public function edicion($datos){
            $this->informacion($datos);
            if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}                
            $sql = "UPDATE $this->tb_projects SET pr_name = '$this->name', pr_direction = '$this->direction', pr_start_date = '$this->start_date', pr_stop_date = '$this->stop_date', pr_description = '$this->description', pr_status = '$this->status', pr_show = '$this->show', pr_category = '$this->category', pr_stage_number='$this->stage_number', pr_current_stage = '$this->current_stage' WHERE id_projects = ".$_SESSION['project_selected'];
            if($this->insertar($sql)){print("ACTUALIZACIÓN REALIZADA SATISFACTORIAMENTE");}
            else{print($sql);}
            unset($_SESSION['project_selected']);
        }
        public function buscar_etapas($id){
            $sql="SELECT pro.pr_name, pro.pr_direction, pro.pr_start_date, pro.pr_stop_date, pro.pr_description, pro.pr_category, pro.pr_stage_number, pro.pr_current_stage, cat.ct_name FROM $this->tb_projects as pro LEFT JOIN $this->tb_category as cat on cat.id_category = pro.pr_category WHERE id_projects=".$id;
            $proyecto = $this->capturar($sql);

            $sql="SELECT * FROM $this->tb_stage as etp WHERE id_project=".$id;
            $etapas = $this->capturar($sql);

            $sql="SELECT * FROM $this->tb_projects_file WHERE id_project=".$id;
            $fotos = $this->capturar($sql);

            $sql="SELECT DISTINCT id_estage FROM $this->tb_projects_file WHERE id_project=".$id;
            $netapas=$this->capturar($sql);
            $imgetapa=[];
            $reemplazar=[];
            for($i=0;$i<count($netapas);$i++){
                $fe=$i+1;
                $reemplazar[$i]='fotografia_etapa_'.$netapas[$i]["id_estage"];
                $imgetapa[$i]='';
                for($ii=0;$ii<count($fotos);$ii++){
                    if($fotos[$ii]["id_estage"]==$netapas[$i]["id_estage"]){
                        $imgetapa[$i]=$imgetapa[$i].'<div class="col-xxl-4 col-xl-4 col-lg-6 col-sm-12"><button class="cerrar-imagen" onclick="delphoto('.$fotos[$ii]["id_file"].')"></button><img src="data:image/jpeg;base64,'.base64_encode($fotos[$ii]["pj_file"]).'" class="col-12"><input type="search" placeholder="DESCRIPCION DE FOTOGRAFIA" maxlength="100" id="description_file_bd_'.$ii.'" name="description_file_bd_'.$ii.'" onchange="update_description_fotografia(this,'.$fotos[$ii]["id_file"].')" value="'.$fotos[$ii]["pj_description"].'" class="desfil2 form-control form-control-sm"></div>';
                    }
                }
            }
            if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
            $_SESSION['project_selected'] = $id;
            print_r(Json_encode(array($proyecto,$etapas,$imgetapa,$reemplazar)));
        }
        public function actualizar_etapas($nombre, $descripcion, $condiciones, $etapa, $proyecto){
            $sql="SELECT id_stage FROM $this->tb_stage WHERE id_project=$proyecto and n_stage=$etapa";
            if ($this->contar($sql)==0){
                $sgl="INSERT INTO $this->tb_stage (id_project, n_stage, name_stage, description_stage, condition_stage) VALUES ($proyecto, $etapa, '$nombre', '$descripcion', '$condiciones')";
            }else{
                $sgl="UPDATE $this->tb_stage SET name_stage='$nombre', description_stage='$descripcion', condition_stage='$condiciones' WHERE id_project=$proyecto and n_stage=$etapa";
            }
            if($this->insertar($sgl)){
                print("ACCION REALIZADA SATISFACTORIAMENTE");
            }
        }
        public function eliminar_etapa($etapa ,$proyecto){
            $sql="DELETE FROM $this->tb_projects_file WHERE id_project = $proyecto AND id_estage = $etapa";
            $o1=$this->insertar($sql);
            if ($o1[1]!=1){print("\n IMAGENES DE ETAPA ELIMINADAS SATISFACTORIAMENTE");}
            
            $sql="DELETE FROM $this->tb_stage WHERE id_project = $proyecto AND n_stage = $etapa";
            $o0=$this->insertar($sql);
            if ($o0[1]!=1){print("\nETAPA ELIMINADA SATISFACTORIAMENTE");}
            
            $sgl="UPDATE $this->tb_stage SET n_stage = n_stage-1 WHERE id_project = $proyecto AND n_stage > $etapa";
            $o2=$this->insertar($sgl);
            if ($o2[1]!=1){print("\nETAPAS RESTANTES ACTUALIZADAS SATISFACTORIAMENTE");}

            $sgl="UPDATE $this->tb_projects_file SET id_estage = id_estage-1 WHERE id_project = $proyecto AND id_estage > $etapa";
            $o2=$this->insertar($sgl);
            if ($o2[1]!=1){print("\nIMAGENES DE ETAPAS RESTANTES ACTUALIZADAS SATISFACTORIAMENTE");}
            
            $sql = "UPDATE $this->tb_projects SET pr_stage_number=pr_stage_number-1 WHERE id_projects = ".$proyecto;
            $o3=$this->insertar($sql);
            if ($o3[1]!=1){print("\nPROYECTO ACTUALIZADO SATISFACTORIAMENTE");}
        }
        public function actualizar_imagen($datos, $imagenes){
            $pr=$datos['proy'];
            $st=$datos['etap'];
            $i=0;
            foreach ($imagenes as $clave => $valor){
                $i++;
                $fotos=$datos['tfotos_'.$i];
                for($ii=0;$ii<$fotos; $ii++){
                    $descripcion=$datos['description_file_'.$i.'_'.$ii];
                    $img=addslashes(file_get_contents($valor['tmp_name'][$ii]));
                    $sql="INSERT INTO $this->tb_projects_file (id_project, id_estage, pj_file, pj_description) VALUES('$pr','$st','$img','$descripcion')";
                    $res=$this->insertar($sql);
                    print("\n IMAGEN $i.$ii DE LA ETAPA $st AGREGADA AL PROYECTO $pr SATISFACTORIAMENTE");
                }
            }
        }
        public function eliminar_fotografia($datos){
            $sql="DELETE FROM $this->tb_projects_file WHERE id_file=".$datos;
            $this->insertar($sql);
            print("IMAGEN ELIMINADA SATISFACTORIAMENTE");
        }
        public function descripcion_fotografia($imagen, $descripcion){
            $sql = "UPDATE $this->tb_projects_file SET pj_description ='$descripcion' where id_file=".$imagen;
            $this->update = $this->insertar($sql);
            print_r($this->update);
            //print("DESCRIPCION ACTUALIZADA SATISFACTORIAMENTE");
        }
    }