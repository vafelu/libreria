<?php
class Querys 
{
    public function __construct() {
      $this->conn = new Database();
    }
  
    public function menu() {
        $s = $this->conn->consulta("SELECT genero, id_genero FROM  generos ORDER BY genero ASC;");
      
        if($s) {
            return $s;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }

    public function libros($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->consulta("SELECT id_libro, libro, fecha, caratula, precio,  autor, genero, editorial FROM libros INNER JOIN autores ON (id_autor = autor_id) INNER JOIN generos ON (id_genero = genero_id) INNER JOIN editoriales ON (id_editorial = editorial_id) WHERE estado IN (1) ORDER BY libro ASC;", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }

    public function up($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->accion("UPDATE municipios SET municipio = ? WHERE estado IN (1) AND municipio IN (?);", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
}