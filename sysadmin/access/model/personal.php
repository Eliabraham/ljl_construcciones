<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Personal extends ProgramModel
    {
        public function ingreso($datos){
            $sql="SELECT id_personal FROM $this->tb_personal limit 1";
            $sesion=[];
            $this->informacion($datos);
            $contar=$this->contar($sql);
            if($contar>0){
                $sql="SELECT id_personal, name, position FROM $this->tb_personal WHERE user='$this->user' and password='$this->password'";
                if($this->contar($sql)>0){
                    $valor=$this->capturar($sql);
                    if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
                    $_SESSION['id_personal'] = $valor[0]['id_personal'];
                    $_SESSION['name']        = $valor[0]['name'];
                    $_SESSION['position']    = $valor[0]['position'];
                    $sesion["accion"]="BIENVENIDO";
                    $fp = fopen(__DIR__."/../view/html/menu", "r");
                    $contenido="";
                    while (!feof($fp)){$contenido = $contenido.fgets($fp);}
                    $sesion["lugar"] = $contenido;
                }
                else{$sesion['accion']="CREDENCIALES NO AUTORIZADAS";}
            }
            #else{
                if($this->user=='admin' and $this->password=='admin'){
                    $sesion["accion"]="BIENVENIDO";
                    $fp = fopen(__DIR__."/../view/html/menu", "r");
                    $contenido="";
                    while (!feof($fp)){$contenido = $contenido.fgets($fp);}
                    $sesion["lugar"] = $contenido;
                }else{$sesion[]="CREDENCIALES NO AUTORIZADAS";}
            #}
            print_r(json_encode($sesion));
        }
        public function agregar($valores){
            $this->informacion($valores);
            $sql="SELECT id_personal FROM $this->tb_personal WHERE user='$this->user' or password='$this->password'";
            if($this->contar($sql)==0){
                $sql="INSERT INTO $this->tb_personal (name, position, ingles, user, password, photo) values ('$this->name','$this->position','$this->ingles','$this->user', '$this->password','foto')";
                $this->insercion=$this->insertar($sql);
                if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
                $_SESSION['personal_id_created']=$this->insercion[1];
            }else{
                $this->insercion[0]='2';
                $this->insercion[1]="YA EXISTEN ESTAS CREDENCIALES EN EL SISTEMA";
            }
            return $this->insercion;
        }
        public function actualizar_foto($foto){
            $imgContent = addslashes(file_get_contents($foto));
            if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
            $id = $_SESSION['personal_id_created'];
            $sql= "UPDATE $this->tb_personal SET photo ='$imgContent' where id_personal=".$id;
            if($this->insertar($sql)){
                print("FOTOGRAFIA INSERTADA SATISFACTORIAMENTE");
            }else{
                print("LA FOTOGRAFIA NO PUDO SER INSERTADA");
            }
            unset($_SESSION['personal_id_created']);
        }
        public function buscar_personal(){
            $sql = "SELECT id_personal, name, position, photo FROM $this->tb_personal";
            $data = $this->capturar($sql);
            $cadena="";
            foreach ($data as $clave => $valor){
                $cadena=$cadena.'<div class="col-xxl-3 col-xl-4 col-lg-4 col_md-5 col-sm-12 col-xs-12 d-inline-block my-3" style="height:350px; float:left;">
                    <div class="container">
                        <div class="row border border-primary py-3" style="height:350px;">
                            <center>
                                <img class=" col-11 img-thumbnail rounded" style="height:180px"  src="data:image/jpeg;base64,'.base64_encode($valor["photo"]).'" alt="foto de perfil">
                                <label class="font-weight-bold lead col-11">'.$valor["name"].'</label><br/>
                                <label class="font-weight-bold lead col-11">'.$valor["position"].'</label>
                                <button name="'.$valor["id_personal"].'" onclick="capturar_personal(this)"class="btn btn-primary col-3">Editar</button>
                                <button name="'.$valor["id_personal"].'" onclick="eliminar_personal(this)" class="btn btn-danger col-3">Eliminar</button>
                                <button name="'.$valor["id_personal"].'" onclick="capturar_ro_personal(this)"class="btn btn-primary col-3">VER</button>
                            </center>
                        </div>
                    </div>
                </div>';
            }
            print($cadena);
        }
        public function eliminar_personal($data){
            try{
                $sql="DELETE FROM $this->tb_personal WHERE id_personal=".$data;
                if($this->insertar($sql)){
                    print("operación delete realizada satisfactoriamente");
                }
            }catch (Exception $e){echo 'Caught exception: '.$e->getMessage()."\n";}
        }
        public function capturar_personal($id){
            $sql="SELECT name, position, ingles, photo FROM $this->tb_personal WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
            $photo='<img class=" col-4 img-thumbnail rounded" style="height:180px"  src="data:image/jpeg;base64,'.base64_encode($datos[0]["photo"]).'" alt="foto de perfil">';
            return array($datos[0]["name"],$datos[0]["position"],$datos[0]["ingles"],$photo);
        }
        public function editar_personal($id, $valores){
            try{
                $this->informacion($valores);
                $sql="UPDATE $this->tb_personal SET name ='$this->name', position='$this->position', ingles='$this->ingles', user='$this->user', password='$this->password' WHERE id_personal=".$id;
                $this->insertar($sql);
            }catch (Exception $e){echo 'Caught exception: '.$e->getMessage()."\n";}
        }
    }
