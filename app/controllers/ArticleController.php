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
    /*
     * The action for article/index
     */
    public function indexAction(){
        //Supply the view with a list of all articles
        $articles = Article::find();
        $this->view->setVar("articles", $articles);
    }

    /*
     * The action for article/create
     */
    public function createAction()
    {
        // Checking a for a valid csrf token
        if ($this->request->isPost()) {
            if (!$this->security->checkToken()) {
                //if the csrf token is not valid, end the algorithm here
                return;
            }
        }

        // Getting a request instance
        $request = new Request();

        // Check whether the request was made with method POST
        if ($request->isPost()) {

            //TODO Question: is there a way to auto map the post data to a model?
            $article = new Article();
            $article->creationDate = $date = date('Y-m-d H:i:s');
            $article->title = $this->request->getPost('title');
            $article->summary = $this->request->getPost('summary');
            $article->content = $this->request->getPost('content');

            //save the article to the database
            if (!$article->save()) {
                //if the save was not successful
                foreach ($article->getMessages() as $message) {
                    //append the validation errors to the flash session
                    $this->flashSession->error($message);
                }
                return;
            }
            //return to the admin article overview so the user can see the new article in the list
            return $this->response->redirect("/article");
        }
    }

    /**The action for article/edit
     * @param $id The id of the article
     */
    public function editAction($id){
        // Checking a for a valid csrf token
        if ($this->request->isPost()) {
            if (!$this->security->checkToken()) {
                //if the csrf token is not valid, end the algorithm here
                return;
            }
        }

        //find the article based on the supplied id
        $article = Article::findFirst(['id = ?0', 'bind' => [$id]]);

        // Getting a request instance
        $request = new Request();

        //if the request is a post perform an update on the record, else prepare the view
        if ($request->isPost()) {

            //map the post data to the db record and update it
            $article->title = $this->request->getPost('title');
            $article->summary = $this->request->getPost('summary');
            $article->content = $this->request->getPost('content');
            $article->creationDate = $this->request->getPost('creationDate');


            //try to update the article, if it fails let the user know what went wrong
            if(!$article->update()){
                //get all the validationErrors and store them in the flashSessions
                foreach ($article->getMessages() as $message) {
                    //append the validation errors to the flash session
                    $this->flashSession->error($message);
                }

                //make sure to pass the article object back to the view because it still requires this object
                $this->view->setVar('article', $article);
                return;
            }

            //just redirect to the article overview
            return $this->response->redirect("/article");

        }else{
            //Prepare the edit view
            $this->view->setVar("article" , $article);
        }
    }

    /*** Deletes a single article record from the database
     * @param $id The id of the article you want to remove from the database
     */
    public function deleteAction($id){
        $article = Article::findFirst($id);
        if($article !== false){
            if($article->delete()){
                //success, just redirect to the article overview
                $this->response->redirect("/article");
            }else{
                //something went wrong
            }
        }
    }

    /*
     * The action for article/archive
     */
    public function archiveAction(){
        $articles = Article::find();
        $this->view->setVar("articles", $articles);
    }

    /*
     * The action for article/detail
     */
    public function detailAction($id){
        $article = Article::findFirst($id);
        $this->view->setVar('article', $article);

    }
}