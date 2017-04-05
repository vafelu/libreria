<?php
class Database extends PDO
{
    private $engine; 
    private $host; 
    private $database; 
    private $user;
    private $pass;
  
    public function __construct() {
        $this->engine = 'mysql';
        $this->host = 'localhost';
        $this->database = 'libreria';
        $this->user = 'vafelu';
        $this->pass = '';
        $this->options = array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
          PDO::ATTR_EMULATE_PREPARES, false);
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host.";chaset=utf8mb4";

        try {
          parent::__construct($dns, $this->user, $this->pass, $this->options);
        } catch(PDOException $e) {
          die("ERROR: " . $e->getMessage());
      }
    }
    
    public function consulta($query, $params = array()) {
       try {
          $stmt = parent::prepare($query);
          $params = is_array($params) ? $params : array($params);
          $stmt->execute($params);

          return $stmt->fetchAll(PDO::FETCH_ASSOC);
       } catch (Exception $e) {
          throw new Exception(__METHOD__ . 'Exception Raised for sql: ' . var_export($query, true) . ' Params: ' . var_export($params, true) . ' Error_Info: ' . var_export($this->errorInfo(), true), 0, $e);
       }
    }
  
    public function accion($query, $params = array()) {
       try {
          $stmt = parent::prepare($query);
          $params = is_array($params) ? $params : array($params);
          $stmt->bindParam(1, $params[0], PDO::PARAM_STR, 255);
          $stmt->bindParam(2, $params[1], PDO::PARAM_STR, 255);
          $stmt->execute();
       } catch (Exception $e) {
          throw new Exception(__METHOD__ . 'Exception Raised for sql: ' . var_export($query, true) . ' Params: ' . var_export($params, true) . ' Error_Info: ' . var_export($this->errorInfo(), true), 0, $e);
       }
    }
}
