<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 16-12-2018
 * Time: 20:39
 */

use Phalcon\Http\Request;
class ArticleController extends ControllerBase
{
    public function indexAction(){
        //get all users
        $articles = Article::find();

        $this->view->setVar("articles", $articles);
    }

    public function createAction(){
        // Getting a request instance
        $request = new Request();

        // Check whether the request was made with method POST
        if ($request->isPost()) {

            //TODO is there a way to auto map the post data to a model?
            $creationDate = $date = date('Y-m-d H:i:s');
            $title = $this->request->getPost('title');
            $summary = $this->request->getPost('summary');
            $content = $this->request->getPost('content');

            $article = new Article();
            $article->creationDate = $creationDate;
            $article->title = $title;
            $article->summary = $summary;
            $article->content = $content;

            $article->save();

            //return to the admin article overview so the user can see the new article in the list
            return $this->response->redirect("/article");
        }
    }

    public function editAction($id){

    }
}