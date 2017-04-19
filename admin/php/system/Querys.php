<?php
class Querys 
{
    public function __construct() {
      $this->conn = new Database();
    }

    public function login($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->consulta("SELECT id_usuario FROM usuarios WHERE usuario IN (?) AND clave IN (?) AND estado IN (1) LIMIT 1;", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
    
    public function dataUser($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->consulta("SELECT nombre, mail FROM usuarios WHERE id_usuario IN (?) AND estado IN (1) LIMIT 1;", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
    
    public function libros($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->consulta("SELECT id_libro, libro, fecha, caratula, precio,  autor, genero, editorial, url FROM libros INNER JOIN autores ON (id_autor = autor_id) INNER JOIN generos ON (id_genero = genero_id) INNER JOIN editoriales ON (id_editorial = editorial_id) WHERE estado IN (1) ORDER BY libro ASC LIMIT 0, 12;", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
    
    public function detLibro($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->consulta("SELECT id_libro, libro, fecha, caratula, precio, url, inventario, paginas, descripcion, codigo, autor_id, genero_id, editorial_id, estado FROM libros WHERE id_libro IN (?) AND estado IN (1) LIMIT 1;", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
    
    public function autores() {
        $id = $this->conn->consulta("SELECT id_autor, autor, bio FROM autores  ORDER BY autor ASC;");
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
    
    public function editoriales() {
        $id = $this->conn->consulta("SELECT id_editorial, editorial FROM editoriales ORDER BY editorial ASC;");
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
    
    public function generos() {
        $id = $this->conn->consulta("SELECT id_genero, genero FROM generos ORDER BY genero ASC;");
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
    
    public function sugeridos($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->consulta("SELECT libro, caratula FROM libros WHERE url NOT IN (?) AND estado IN (1) ORDER BY RAND() LIMIT 6;", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }

    public function actualizarLibro($p = array()) {
        $pa = is_array($p) ? $p : array($p);
        $id = $this->conn->accion("UPDATE libros SET libro = ?, fecha = ?, caratula = ?, inventario = ?, precio = ?, paginas = ?, descripcion = ?, codigo = ?, url = ?, estado = ?, autor_id = ?, editorial_id = ?, genero_id = ? WHERE id_libro IN (?);", $pa);
        if($id) {
            return $id;
        } else {
            return false;
        }

        $this->conn = NULL;
        exit();
    }
}