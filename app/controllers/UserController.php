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
        //get the login data from the post
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //TODO if username/ password empty

        //check if a user with the supplied username is present in the database
        $user = User::findFirst([
            conditions => "username = ?1",
            bind => [1 => $username]
        ]);

        //if a user with the supplied username was found, check if the combination of password and username is valid
        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {

                //redirect to the admin home page
                return $this->response->redirect("/index");
            }
            else{
                //TODO invalid combination of password and username...
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

        //for now just redirect to the homepage after inserting the demo user
        return $this->response->redirect("/index");
    }
}