<?php
/**
 * Created by PhpStorm.
 * User: joao.silva
 * Date: 29/10/2015
 * Time: 17:35
 */

namespace Helpers;

use PDOException;
use Slim\Slim;

class JsonHelper
{
    /**
     * @var Slim $app
     */
    public $app;

    public function __construct(Slim $app){
        $this->app = $app;
    }

    public function toJson($data){
        if ($data){
            $this->app->response->setStatus(200);
            $this->app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($data);
        } else {
            throw new PDOException('No records found.');
        }
    }
}