<?php
    include_once(__DIR__."/../../../model/mprincipal.php");
    class Personalproyecto extends ProgramModel{
        public function agregar($proyectos, $id){
            $contador=0;
            $res_proy="";
            foreach ($proyectos as $clave => $valor){
                $this->informacion($valor);
                $sql="INSERT INTO $this->tb_personal_project (id_personal, cliente, nombre, descripcion, participacion, logros) values ($id, '$this->Cliente','$this->Nombre','$this->Descripcion','$this->Participacion','$this->Logros')";
                $ins=$this->insertar($sql);
                $contador++;
                if($ins[0]==1){ 
                    $res_proy = $res_proy."\nREGISTRO PROYECTO: ".$contador." SATISFACTORIO";
                }else{
                    $res_proy = $res_proy."\nREGISTRO DE PROYECTO: ".$contador." FALLIDO: ".$ins;
                }
            }
            return $res_proy;
        }
        public function capturar_proyecto($id){
            $sql="SELECT * FROM $this->tb_personal_project WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
            return $datos;
        }
        public function eliminar($id){
            $sql ="DELETE FROM $this->tb_personal_project WHERE id_personal=".$id;
            $datos=$this->capturar($sql);
        }

    }
