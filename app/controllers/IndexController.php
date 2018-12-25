<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 14-12-2018
 * Time: 18:56
 */

class IndexController extends ControllerBase
{
    /*
     * The action to load the homepage.
     */
    public function indexAction(){
        //Supply the view with the 5 most recent articles
        $articles = Article::find([
                'order' => 'creationDate DESC',
                'limit' => 5
        ]);
        $this->view->setVar("articles", $articles);
    }

}