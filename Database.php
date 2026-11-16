<?php 
// Database.php 
class Database { 
    private $host   = "localhost"; 
    private $dbname = "koperasi"; 
    private $user   = "root"; 
    private $pass   = ""; 
    private $pdo;                       // dikunci (private) 
  
    public function __construct() { 
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4"; 
        $this->pdo = new PDO($dsn, $this->user, $this->pass); 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
    } 
  
    // Getter: meminjamkan koneksi 
    public function getConnection() { 
        return $this->pdo; 
    } 
}