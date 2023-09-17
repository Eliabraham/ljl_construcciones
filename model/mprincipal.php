<?php
    include_once("bd_show.php");
    class ProgramModel
    {
        public $cone;
        public $gsent;
        public $database                 ="jlj_construccion";
        public $tb_personal              ="personal";
        public $tb_personal_contacto     ="personal_contact";
        public $tb_personal_estudios     ="personal_studies";
        public $tb_personal_experiencias ="personal_work_experience";
        public $tb_personal_project      ="personal_project";
        public $tb_projects              ="projects";
        public $tb_category              ="tb_category";
        public $tb_stage                 ="projects_stage";
        public $tb_projects_file         ="projects_file";
        public $tb_company               ="our_company";
        public $tb_our_file              ="our_company_file";
        public function informacion($params)
        {
            foreach ($params as $clave => $valor){$this->$clave=$valor;}
        }
        public function contar($sql)
        {
            try
            {
                $this->cone = new Conexion_lct();
                $this->gsent=$this->cone->prepare($sql);
                $this->gsent->execute();
                $this->cone = null;
                unset($this->cone);
                return $this->gsent->rowCount();
            }
            catch(PDOException $e){echo 'error: '.$e->getMessage();}
        }
        public function capturar($sql)
        {
            try
            {
                $this->cone = new Conexion_lct();
                $this->gsent=$this->cone->prepare($sql);
                $this->gsent->execute();
                $this->cone = null;
                unset($this->cone);
                return $this->gsent->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e){echo 'error: '.$e->getMessage();}
        }
        public function insertar($sql)
        {
            try
            {
                $this->cone = new Conexion_lct();
                $this->gsent=$this->cone->exec($sql);
                $id = [$this->gsent, $this->cone->lastInsertId()];
                $this->cone = null;
                unset($this->cone);
                return $id;
            }
            catch(PDOException $e){return $e->getMessage();}
        }
        public function crear_carpeta($carpeta)
        {
            if (!file_exists($carpeta))
            {
                if(!mkdir($carpeta, 0777, true))
                {
                    die('Fallo al crear las carpetas...');
                }
            }
        }
    }