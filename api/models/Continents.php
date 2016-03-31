<?php
/**
 * Created by PhpStorm.
 * User: joao.silva
 * Date: 30/10/2015
 * Time: 09:19
 */

namespace models;

use Helpers\DBHelper;
use PDO;

class Continents
{
    public function getContinents(){
        $db = new DBHelper();
        $db->buildQuery("SELECT *  FROM continents");
        return $db->executeQuery();
    }

    public function getCountries($continent_id){
        $continentIdParam = ":continent_id";
        $db = new DBHelper();
        $db->buildQuery("SELECT *  FROM countries where continent_id = ".$continentIdParam);
        $db->addParam($continentIdParam, $continent_id, PDO::PARAM_INT);
        return $db->executeQuery();
    }
}