<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Corporativa extends ProgramModel{
        public function mision($data, $archivos){
            $img="no";
            if($data['valmision']!=""){
                if(count($archivos)>1){$img="si";}
                $texto=$data['valmision'];
                $mimag=$data['valmostrarfilemision'];
                $sql = "SELECT id FROM $this->tb_company WHERE c_name='mision' and idiom='esp'";
                if($this->contar($sql)==0){
                    $accion="INSERT INTO $this->tb_company (idiom, c_name, c_description,mostrar_file)VALUES('esp','mision','$texto','$mimag')";
                }
                if($this->contar($sql) > 0){
                    $accion="UPDATE $this->tb_company SET mostrar_file='$mimag', c_description='$texto' WHERE c_name='mision' and idiom='esp'";
                }
            }else{$accion="DELETE FROM $this->tb_company WHERE c_name = 'mision' and idiom = 'esp'";}
            if ($this->insertar($accion)){print("\nACCION SOBRE LA MISION REALIZADA SATISFACTORIAMENTE");}
            if($img=="si"){
                $sql = "SELECT id FROM $this->tb_company WHERE c_name='mision' and idiom='esp'";
                $id=$this->capturar($sql);
                $id_rel = $id[0]['id'];
                $n=$data['nim']+1;
                for($i=1;$i<$n;$i++){
                    $img = addslashes(file_get_contents($archivos['photo'.$i]['tmp_name']));
                    $texto=$data['description_file_'.$i];
                    $sgl="INSERT INTO $this->tb_our_file(id_our, our_file, descripcion) VALUES($id_rel, '$img', '$texto')";
                    if($this->insertar($sgl)){
                        print("\nIMAGEN $i DE MISION REALIZADA SATISFACTORIEMENTE");
                    }
                }
            }
        }
        public function vision($data, $archivos){
            $img="no";
            if($data['valvision']!=""){
                if(count($archivos)>1){$img="si";}
                $sql = "SELECT id FROM $this->tb_company WHERE c_name='vision' and idiom='esp'";
                $texto = $data['valvision'];
                $mimag=$data['valmostrarfilevision'];
                if($this->contar($sql)==0){
                    $accion="INSERT INTO $this->tb_company (idiom, c_name, c_description, mostrar_file)VALUES('esp','vision','$texto', $mimag)";
                }
                if($this->contar($sql) > 0){
                    $accion="UPDATE $this->tb_company SET c_description='$texto', mostrar_file='$mimag' WHERE c_name='vision' and idiom='esp'";
                }
            }
            else{$accion="DELETE FROM $this->tb_company WHERE c_name = 'vision' and idiom = 'esp'";}
            $resultado = $this->insertar($accion);
            if ($resultado[0]==1){print("\nACCION SOBRE LA VISION REALIZADA SATISFACTORIAMENTE");}
            if($img=="si"){
                $sql = "SELECT id FROM $this->tb_company WHERE c_name='vision' and idiom='esp'";
                $id=$this->capturar($sql);
                $id_rel = $id[0]['id'];
                $n=$data['niv']+1;
                for($i=1;$i<$n;$i++){
                    $img = addslashes(file_get_contents($archivos['photo'.$i]['tmp_name']));
                    $texto=$data['description_file_'.$i];
                    $sgl="INSERT INTO $this->tb_our_file(id_our, our_file, descripcion) VALUES($id_rel, '$img', '$texto')";
                    if($this->insertar($sgl)){print("\nIMAGEN $i DE VISION REALIZADA SATISFACTORIEMENTE");}
                }
            }
        }
        public function historia($data, $archivos){
            $img="no";
            if($data['valhistoria']!=""){
                if(count($archivos)>1){$img="si";}
                $sql = "SELECT id FROM $this->tb_company WHERE c_name='historia' and idiom='esp'";
                $mimag=$data['valmostrarfilehistoria'];
                $texto = $data['valhistoria'];
                if($this->contar($sql)==0){
                    $accion="INSERT INTO $this->tb_company (idiom, c_name, c_description, mostrar_file)VALUES('esp','historia','$texto', '$mimag')";
                }
                if($this->contar($sql) > 0){
                    $accion="UPDATE $this->tb_company SET c_description='$texto', mostrar_file='$mimag' WHERE c_name='historia' and idiom='esp'";
                }
            }
            else{$accion="DELETE FROM $this->tb_company WHERE c_name = 'historia' and idiom = 'esp'";}
            $resultado = $this->insertar($accion);
            if ($resultado[0]==1){print("\nACCION SOBRE LA HISTORIA REALIZADA SATISFACTORIAMENTE");}
            if($img=="si"){
                $sql = "SELECT id FROM $this->tb_company WHERE c_name='historia' and idiom='esp'";
                $id=$this->capturar($sql);
                $id_rel = $id[0]['id'];
                $n=$data['nih']+1;
                for($i=1;$i<$n;$i++){
                    $img = addslashes(file_get_contents($archivos['photo'.$i]['tmp_name']));
                    $texto=$data['description_file_'.$i];
                    $sgl="INSERT INTO $this->tb_our_file(id_our, our_file, descripcion) VALUES($id_rel, '$img', '$texto')";
                    if($this->insertar($sgl)){
                        print("\nIMAGEN $i HISTORICA REALIZADA SATISFACTORIEMENTE");
                    }
                }
            }
        }
        public function buscar_v(){
            $sql="SELECT * FROM $this->tb_company WHERE c_name='vision'";
            $data=$this->capturar($sql);
            if(count($data)>0){
                $sql = "SELECT * FROM $this->tb_our_file WHERE id_our =". $data[0]['id'];
                $cadima="";
                $img = $this->capturar($sql);
                for($i=0;$i<count($img);$i++){
                    $cadima=$cadima.'<div class="col-xxl-4 col-xl-4 col-lg-5 col-lg-5 col-sm-10">
                        <button class="cerrar-imagen" onclick="delphoto('.$img[$i]["id"].')"></button>
                        <img src="data:image/jpeg;base64,'.base64_encode($img[$i]["our_file"]).'" class="col-12">
                        <label>'.$img[$i]["descripcion"].'</label>
                    </div>';
                }
                $array=[
                    "descripcion"  => $data[0]["c_description"] ,
                    "imagenes" => $cadima
                ];
                print_r(json_encode($array));
            }
        }
        public function buscar_m(){
            $sql="SELECT * FROM $this->tb_company WHERE c_name='mision'";
            $data=$this->capturar($sql);
            if(count($data)>0){
                $sql = "SELECT * FROM $this->tb_our_file WHERE id_our =". $data[0]['id'];
                $cadima="";
                $img = $this->capturar($sql);
                for($i=0;$i<count($img);$i++){
                    $cadima=$cadima.'<div class="col-xxl-4 col-xl-4 col-lg-5 col-lg-5 col-sm-10">
                    <button class="cerrar-imagen" onclick="delphoto('.$img[$i]["id"].')"></button>
                    <img src="data:image/jpeg;base64,'.base64_encode($img[$i]["our_file"]).'" class="col-12">
                    <label>'.$img[$i]["descripcion"].'</label>
                    </div>';
                }
                $array=[
                    "descripcion"  => $data[0]["c_description"] ,
                    "imagenes" => $cadima
                ];
                print_r(json_encode($array));
            }
        }
        public function buscar_h(){
            $sql="SELECT * FROM $this->tb_company WHERE c_name='historia'";
            $data=$this->capturar($sql);
            if(count($data)>0){
                $sql = "SELECT * FROM $this->tb_our_file WHERE id_our =". $data[0]['id'];
                $cadima="";
                $img = $this->capturar($sql);
                for($i=0;$i<count($img);$i++){
                    $cadima=$cadima.'<div class="col-xxl-4 col-xl-4 col-lg-5 col-lg-5 col-sm-10"><button class="cerrar-imagen" onclick="delphoto('.$img[$i]["id"].')"></button><img src="data:image/jpeg;base64,'.base64_encode($img[$i]["our_file"]).'" class="col-12"><label>'.$img[$i]["descripcion"].'</label></div>';
                }
                $array=[
                    "descripcion"  => $data[0]["c_description"] ,
                    "imagenes" => $cadima
                ];
                print_r(json_encode($array));
            }
        }
        public function buscar_valores(){
            $sql="SELECT * FROM $this->tb_company WHERE c_name like 'valor%'";
            $res=$this->capturar($sql);
            print_r(json_encode($res));
        }
        public function eliminar_imagen($id){
            $sql="DELETE FROM $this->tb_our_file WHERE id=".$id;
            if($this->insertar($sql)){print("RETIRO DE IMAGEN SATISFACTORIO");}
        }
        public function valores($valores){
            //print_r($valores);
            //die();
            $sql="DELETE FROM $this->tb_company WHERE c_name like 'valor%'";
            $this->insertar($sql);
            foreach ($valores as $clave => $valor){
                $c_name='valor_'.$valor['Valor'];
                $descri=$valor['Descripción'];
                $sql="INSERT INTO $this->tb_company (idiom, c_name, c_description, mostrar_file) VALUES('esp','$c_name','$descri','')";
                if($this->insertar($sql)){
                    print("\nACCION SOBRE VALORES REALIZADA SATISFACTORIAMENTE");
                }
            }
        }
        public function jumbotrom($data,$file){
            $sql="SELECT id FROM $this->tb_company WHERE c_name LIKE 'jumbotrom%'";
            $databd = $this->capturar($sql);
            $texto  = $data['lema'];
            $jumbo  = "jumbotrom-".$data['desplegar'];
            $img    = "no";
            if($texto!=""){
                if(count($file) > 1){$img="si";}
                if(count($databd)==0){
                    $sql="INSERT INTO $this->tb_company(idiom, c_name, c_description)VALUES('esp', '$jumbo', '$texto')";
                }else{
                    $sql="UPDATE $this->tb_company SET c_name='$jumbo', c_description='$texto'  WHERE id=".$databd[0]['id'];
                }
            }else{
                $sql ="DELETE FROM $this->tb_company WHERE c_name LIKE 'jumbotrom%'";
            }
            $resultado = $this->insertar($sql);
            if ($resultado){print("\nACCION SOBRE EL JUMBOTROM REALIZADA SATISFACTORIAMENTE");}
            if($img=="si"){
                $sql = "SELECT id FROM $this->tb_company WHERE c_name LIKE 'jumbotrom%' and idiom='esp'";
                $id = $this->capturar($sql);
                $id_rel = $id[0]['id'];
                $n=$data['nijt']+1;
                for($i=1;$i<$n;$i++){
                    $img = addslashes(file_get_contents($file['photo'.$i]['tmp_name']));
                    $texto=$data['description_file_'.$i];
                    $sgl="INSERT INTO $this->tb_our_file(id_our, our_file, descripcion) VALUES($id_rel, '$img', '$texto')";
                    if($this->insertar($sgl)){
                        print("\nIMAGEN $i JUMBOTROM REALIZADA SATISFACTORIEMENTE");
                    }
                }
            }
        }
        public function buscar_jt(){
            $sql="SELECT * FROM $this->tb_company WHERE c_name like 'jumbotrom%'";
            $data=$this->capturar($sql);
            if(count($data)>0){
                $sql = "SELECT * FROM $this->tb_our_file WHERE id_our =". $data[0]['id'];
                $cadima="";
                $img = $this->capturar($sql);
                for($i=0;$i<count($img);$i++){
                    $cadima=$cadima.'<div class="col-xxl-4 col-xl-4 col-lg-5 col-lg-5 col-sm-10"><button class="cerrar-imagen" onclick="delphoto('.$img[$i]["id"].')"></button><img src="data:image/jpeg;base64,'.base64_encode($img[$i]["our_file"]).'" class="col-12"><label>'.$img[$i]["descripcion"].'</label></div>';
                }
                $array=[
                    "c_name"       => $data[0]["c_name"],
                    "descripcion"  => $data[0]["c_description"] ,
                    "imagenes"     => $cadima
                ];
                print_r(json_encode($array));
            }
        }
        public function contacto($valores){
            $sql="DELETE FROM $this->tb_company WHERE c_name like 'contacto%'";
            $this->insertar($sql);
            foreach ($valores as $clave => $valor){
                $c_name='contacto_'.$valor['Tipo'];
                $descri=$valor['Descripcion'];
                $sql="INSERT INTO $this->tb_company (idiom, c_name, c_description) VALUES('esp','$c_name','$descri')\n";
                if($this->insertar($sql)){
                    print("\nACCION SOBRE CONTACTOS REALIZADA SATISFACTORIAMENTE");
                }
            }
        }
        public function buscar_contactos(){
            $sql="SELECT * FROM $this->tb_company WHERE c_name like 'contacto%'";
            $res=$this->capturar($sql);
            print_r(json_encode($res));
        }
        public function politica($valores){
            $sql="DELETE FROM $this->tb_company WHERE c_name like 'politica%'";
            $this->insertar($sql);
            foreach ($valores as $clave => $valor){
                $c_name='politica_'.$valor['Asunto'];
                $descri=$valor['Descripcion'];
                $sql="INSERT INTO $this->tb_company (idiom, c_name, c_description, mostrar_file ) VALUES('esp','$c_name','$descri','')\n";
                if($this->insertar($sql)){
                    print("\nACCION SOBRE POLITICAS REALIZADA SATISFACTORIAMENTE");
                }
            }
        }
        public function buscar_politica(){
            $sql="SELECT * FROM $this->tb_company WHERE c_name like 'politica%'";
            $res=$this->capturar($sql);
            print_r(json_encode($res));
        }
    }
