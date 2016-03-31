<?php
/**
 * Created by PhpStorm.
 * User: joao.silva
 * Date: 29/10/2015
 * Time: 17:32
 */

namespace models;

use Helpers\DBHelper;
use Models\Cities;
use PDO;

class Countries
{
    public function getCountries(){
        $db = new DBHelper();
        $db->buildQuery("SELECT *  FROM countries");
        return $db->executeQuery();
    }

    public function getCities($country_id){
        $countryIdParam = ":country_id";
        $db = new DBHelper();
        $db->buildQuery("SELECT ".Cities::CitiesFieldsQuery." FROM cities LEFT JOIN countries ON cities.country_id = countries.country_id WHERE cities.country_id = ".$countryIdParam);
        $db->addParam($countryIdParam, $country_id, PDO::PARAM_INT);
        return $db->executeQuery();
    }
}