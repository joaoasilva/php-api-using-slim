<?php
require 'vendor/autoload.php';

use Helpers\JsonHelper;
use Models\Cities;
use Models\Continents;
use Models\Countries;

$app = new \Slim\Slim();
$jsonHelper = new JsonHelper($app);

$app->get('/', function() use($app) {
    $app->response->setStatus(200);
    echo "Welcome to Slim 3.0 based API";
});

$app->get('/countries/getAll', function() use($app, $jsonHelper) {
    $app->response->setStatus(200);
    $countries = new Countries();
    $jsonHelper->toJson($countries->getCountries());
});

$app->get('/countries/getCities/:id', function($country_id) use($app, $jsonHelper) {
    $app->response->setStatus(200);
    $countries = new Countries();
    $jsonHelper->toJson($countries->getCities($country_id));
});

$app->get('/continents/getAll', function() use($app, $jsonHelper) {
    $app->response->setStatus(200);
    $continents = new Continents();
    $jsonHelper->toJson($continents->getContinents());
});

$app->get('/continents/getCountries/:id', function($continent_id) use($app, $jsonHelper) {
    $app->response->setStatus(200);
    $continents = new Continents();
    $jsonHelper->toJson($continents->getCountries($continent_id));
});

$app->get('/cities/getAll', function() use($app, $jsonHelper) {
    $app->response->setStatus(200);
    $cities = new Cities();
    $jsonHelper->toJson($cities->getAll());
});

$app->get('/cities/getCity/:id', function($city_id) use($app, $jsonHelper) {
    $app->response->setStatus(200);
    $cities = new Cities();
    $jsonHelper->toJson($cities->getCity($city_id));
});

$app->run();