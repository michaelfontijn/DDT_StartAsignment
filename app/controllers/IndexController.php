<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 14-12-2018
 * Time: 18:56
 */

class IndexController extends ControllerBase
{
    public function indexAction(){
        $this->view->title = "Volt operational";
    }
}