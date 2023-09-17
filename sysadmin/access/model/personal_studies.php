<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Personalestudies extends ProgramModel{
        public function agregar($estudios, $id){
            $contador=0;
            $res_est="";
            foreach ($estudios as $clave => $valor){
                $this->informacion($valor);
                $sql="INSERT INTO $this->tb_personal_estudios (id_personal, instituto, grado, anno) values ($id, '$this->Instituto','$this->Grado','$this->Año')";
                $ins=$this->insertar($sql);
                $contador++;
                if($ins[0]==1){ 
                    $res_est = $res_est."\nREGISTRO ESTUDIO: ".$contador." SATISFACTORIO";
                }else{
                    $res_est = $res_est."\nREGISTRO DE ESTUDIOS: ".$contador." FALLIDO: ".$ins;
                }
            }
            return $res_est;
        }
        public function capturar_estudios($id){
            $sql="SELECT * FROM $this->tb_personal_estudios WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
            return $datos;
        }
        public function eliminar($id){
            $sql ="DELETE FROM $this->tb_personal_estudios WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
        }

    }