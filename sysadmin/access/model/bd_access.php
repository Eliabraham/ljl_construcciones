<?php
  class Conexionadmin extends PDO { 
    private $tipo = 'mysql';
    private $host = 'localhost';
    #private $bd = 'id20080817_ljl_construccion';
    #private $usuario = 'id20080817_administrador';
    #private $clave = 'Nathanaelito-2022'; 
    private $bd = 'jlj_construccion';
    private $usuario = 'root';
    private $clave = ''; 
    public function __construct() {
      try{
        parent::__construct("{$this->tipo}:dbname={$this->bd};host={$this->host};charset=utf8", $this->usuario, $this->clave);
      }catch(PDOException $e){
        echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
        exit;
      }
    }
  }
