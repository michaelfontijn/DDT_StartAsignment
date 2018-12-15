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
        $this->view->title = "Welcome!";


        //TODO remove this!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        //Add all the css to a collection so it can be rendered in the view
//        $cssCollection = $this->assets->collection('cssCollection');
//        $cssCollection->addCss('css/site.css');
//
//        //Add al the js to a collection so it can be rendered in the view
//        $jsCollection = $this->assets->collection('jsCollection');
//        $jsCollection->addJs('js/site.js');
    }
}