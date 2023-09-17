<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Personalcontact extends ProgramModel{
        public function agregar($contacto, $id){
            $contador=0;
            $res_cont="";
            foreach ($contacto as $clave => $valor){
                $this->informacion($valor);
                $sql="INSERT INTO $this->tb_personal_contacto (id_personal, type, content, schedule) values ($id, '$this->Tipo','$this->Valor','$this->Horario')";
                $ins=$this->insertar($sql);
                $contador++;
                if($ins[0]==1){ 
                    $res_cont = $res_cont."\n REGISTRO CONTACTO: ".$contador." SATISFACTORIO";
                }else{
                    $res_cont = $res_cont."\n REGISTRO DE CONTACTO: ".$contador." FALLIDO: ".$ins;
                }
            }
            return $res_cont;
        }
        public function capturar_contacto($id){
            $sql="SELECT * FROM $this->tb_personal_contacto WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
            return $datos;
        }
        public function eliminar($id){
            $sql ="DELETE FROM $this->tb_personal_contacto WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
        }
    }