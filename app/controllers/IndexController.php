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
        //get all articles from the database
        $articles = Article::find([
                'order' => 'creationDate DESC',
                'limit' => 5
        ]);

        $this->view->setVar("articles", $articles);
    }

}