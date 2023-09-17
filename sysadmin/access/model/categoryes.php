<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Category extends ProgramModel
    {
        public function agregar($categoria){
            $this->informacion($categoria);
            $sql="SELECT id_category FROM $this->tb_category WHERE ct_name='$this->name'";
            if($this->contar($sql)==0){
                try{
                    $sql="INSERT INTO $this->tb_category (ct_name, ct_description, image_one, image_two) values ('$this->name','$this->description','','')";
                    $this->insercion=$this->insertar($sql);
                    if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
                    $_SESSION['category_id_created'] = $this->insercion[1];
                    print("CATEGORIA CREADA SATISFACTORIAMENTE");
                }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
            }else{
                $categoria = $this->capturar($sql);
                $sql = "UPDATE $this->tb_category SET ct_name ='$this->name', ct_description='$this->name' where id_category = ".$categoria['id_category'];
                $this->insercion = $this->insertar($sql);
                if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
                $_SESSION['category_id_created']=$categoria['id_category'];
            }
        }
        public function editar($categoria){
            try{
                $this->informacion($categoria);
                if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
                $sql = "UPDATE $this->tb_category SET ct_name ='$this->name', ct_description='$this->description' WHERE id_category = ".$_SESSION['category_id_created'];
                $this->insertar($sql);
                print("ACTUALIZACIÓN REALIZADA SATISFACTORIAMENTE");
            }catch (Exception $e){echo 'error: '.$e->getMessage()."\n";}
        }
        public function actualizar_imagenes($im1,$im2){
            if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
            $id = $_SESSION['category_id_created'];
            if($im1!="no"){
                $gimg1 = addslashes(file_get_contents($im1));
                $sql= "UPDATE $this->tb_category SET image_one ='$gimg1' where id_category=$id";
                if($this->insertar($sql)){
                    print("\nIMAGEN 1 ACTUALIZADA SATISFACTORIAMENTE");
                }
            }
            if($im2!="no"){
                $gimg2 = addslashes(file_get_contents($im2));
                $sql= "UPDATE $this->tb_category SET image_two ='$gimg2' where id_category=$id";
                if($this->insertar($sql)){
                    print("\nIMAGEN 2 ACTUALIZADA SATISFACTORIAMENTE");
                }
            }
            unset($_SESSION['category_id_created']);
        }
        public function buscar_categoria(){
            $sql = "SELECT * FROM $this->tb_category";
            $data = $this->capturar($sql);
            $cadena="";
            foreach ($data as $clave => $valor){
                $cadena=$cadena.'<div class="col-xxl-3 col-xl-4 col-lg-4 col_md-5 col-sm-12 col-xs-12 d-inline-block my-3" style="height:350px; float:left;">
                    <div class="container">
                        <div class="row border border-primary py-3" style="height:350px;">
                            <center>
                                <div id="carouselExampleSlidesOnly" class="carousel slide col-11" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" style="height:180px" src="data:image/jpeg;base64,'.base64_encode($valor["image_one"]).'" alt="imagen1">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" style="height:180px" src="data:image/jpeg;base64,'.base64_encode($valor["image_two"]).'" alt="imagen1">
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <label class="font-weight-bold lead col-12 text-center">'.$valor["ct_name"].'</label>
                            <div class="descripcion">
                                <label class="col-12" style="text-align:justify">'.substr($valor["ct_description"], 0, 100).'...</label>
                                <label class="col-12 text-justify text-monospace d-none">'.$valor["ct_description"].'</label>
                            </div>
                            <center>
                                <button class="btn btn-primary btn-sm col-4 align-bottom" onclick="iniciar_edicion(this)" name="'.$valor["id_category"].'">Editar</button>
                                <button class="btn btn-danger btn-sm col-4 align-bottom" onclick="eliminar_categoria(this)" name="'.$valor["id_category"].'">Eliminar</button>
                            </center>
                        </div>
                    </div>
                </div> '; 
            }
            print($cadena);
        }
        public function eliminar_categoria($categoria){
            $sql="SELECT pr_category FROM $this->tb_projects WHERE pr_category=".$categoria;
            if($this->contar($sql)==0){
                $sql="DELETE FROM $this->tb_category WHERE id_category=".$categoria;
                if($this->insertar($sql)){print("ACCION REALIZADA SATISFACTORIAMENTE");}
            }else{
                print("NO SE PUEDE ELIMINAR ESTA CATEGORIA YA QUE CONTIENE ALGUNOS PROYECTOS");
            }
        }
        public function traer_categoria($id){
            $sql="SELECT * FROM $this->tb_category WHERE id_category=".$id;
            $data = $this->capturar($sql);
            $im1='<img class=" col-11 img-thumbnail rounded" style="height:180px"  src="data:image/jpeg;base64,'.base64_encode($data[0]["image_one"]).'" alt="imagen de categoria">';
            $im2='<img class=" col-11 img-thumbnail rounded" style="height:180px"  src="data:image/jpeg;base64,'.base64_encode($data[0]["image_two"]).'" alt="imagen de categoria">';
            if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
            $_SESSION['category_id_created']=$id;
            print_r(json_encode(array($data[0]["ct_name"], $data[0]["ct_description"], $im1, $im2)));
        }
    }