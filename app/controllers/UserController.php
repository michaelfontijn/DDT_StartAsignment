<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 15-12-2018
 * Time: 18:41
 */

class UserController extends ControllerBase
{

    public function indexAction(){
        $cssCollection = $this->assets->collection('cssCollection');
        $cssCollection->addCss('css/login.css');
    }

    public function loginAction(){
        $sessions = $this->getDI()->getShared("session");

        //check if the user is already logged in
        if ($sessions->has("user_id")) {
            return $this->response->redirect("/index");
        }

        //get the login data from the post
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //check if a user with the supplied username is present in the database
        $user = User::findFirst([
            conditions => "username = ?1",
            bind => [1 => $username]
        ]);

        //if a user with the supplied username was found, check if the combination of password and username is valid
        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {
                //put the users unique identifier in a session
                $sessions->set("user_id", $user->username);
                //redirect to the admin
                return $this->response->redirect("/index");
            }
        }
    }

    public function createAction(){
        $user = new User();


        //you would normally retrieve the user data from the post like:
        //$username = $this->request->getPost('username');
        //$password = $this->request->getPost('password');

        //for this assignment user registration wasn't mandatory so i create one test user manually
        $username = "michael";
        $password = "test";

        $user->username = $username;
        $user->password = $this->security->hash($password);

        $user->save();
    }
}