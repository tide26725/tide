<?php
namespace app\Database;

use PDO;

class Db {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "learndb";
    
    protected $pdo;

    function __construct() {
        $this->pdo = $this->connect();
    }

    protected function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
        $pdo = new PDO($dsn, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
    }
}
?>