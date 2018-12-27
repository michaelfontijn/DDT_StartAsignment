<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 14-12-2018
 * Time: 18:56
 */


use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerBase extends Controller
{
    public function initialize()
    {
        //register all local css assets
        $this->assets->addCss('css/site.css');
        $this->assets->addCss('css/login.css');


        //register all local js assets
        $this->assets->addJs('js/site.js');
    }
}
