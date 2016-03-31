<?php
/**
 * Created by PhpStorm.
 * User: joao.silva
 * Date: 30/10/2015
 * Time: 08:51
 */

namespace Helpers;


use PDO;
use PDOStatement;

class DBHelper
{
    private $dbConnection;
    /**
     * @var PDOStatement $query
     */
    private $query;

    public function __construct(){
        $this->dbConnection = $this->getDB();
    }

    public function getDB()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "reemote";

        $mysql_conn_string = "mysql:host=$dbhost;dbname=$dbname";
        $dbConnection = new PDO($mysql_conn_string, $dbuser, $dbpass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }

    public function buildQuery($query){

        $this->query = $this->dbConnection->prepare($query);

    }

    public function addParam($paramName, $value, $paramType){
        $this->query->bindParam($paramName, $value, $paramType);
    }

    public function executeQuery(){
        $this->query->execute();
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }
}