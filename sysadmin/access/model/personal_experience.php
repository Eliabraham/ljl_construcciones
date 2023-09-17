<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Personalexperience extends ProgramModel{
        public function agregar($experiencias, $id){
            $contador=0;
            $res_expe="";
             foreach ($experiencias as $clave => $valor){
                $this->informacion($valor);
                $sql="INSERT INTO $this->tb_personal_experiencias (id_personal, empresa, cargo, area, annos, logros) values ($id, '$this->Empresa','$this->Cargo','$this->Area','$this->Años','$this->Logros')";
                $ins=$this->insertar($sql);
                $contador++;
                if($ins[0]==1){ 
                    $res_expe = $res_expe."\nREGISTRO EXPERIENCIA: ".$contador." SATISFACTORIO";
                }else{
                    $res_expe = $res_expe."\nREGISTRO DE EXPERIENCIA: ".$contador." FALLIDO: ".$ins;
                }
            }
            return $res_expe;
        }
        public function capturar_experiencia($id){
            $sql="SELECT * FROM $this->tb_personal_experiencias WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
            return $datos;
        }
        public function eliminar($id){
            $sql ="DELETE FROM $this->tb_personal_experiencias WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
        }
    }