<?php
/**
 * Created by PhpStorm.
 * User: joao.silva
 * Date: 30/10/2015
 * Time: 10:27
 */

namespace models;


use Helpers\DBHelper;
use PDO;

class Cities
{
    const CitiesFieldsQuery = " cities.city_id, cities.name, cities.living_cost, cities.rent_index, cities.rent_apartment, cities.utilities, cities.transport, cities.groceries, cities.weather, cities.air_quality, cities.internet_speed, cities.price_pint, cities.price_meal, cities.price_cappuccino, cities.country_id, cities.normalized_name, cities.salary, countries.continent_id ";

    public function getAll(){
        $db = new DBHelper();
        $db->buildQuery("SELECT ".Cities::CitiesFieldsQuery." FROM cities LEFT JOIN countries ON cities.country_id = countries.country_id");
        return $db->executeQuery();
    }

    public function getCity($city_id){
        $cityIdParam = ":city_id";
        $db = new DBHelper();
        $db->buildQuery("SELECT ".Cities::CitiesFieldsQuery." FROM cities LEFT JOIN countries ON cities.country_id = countries.country_id WHERE cities.city_id = ".$cityIdParam);
        $db->addParam($cityIdParam, $city_id, PDO::PARAM_INT);
        return $db->executeQuery();
    }
}