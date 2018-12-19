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

    }

    public function loginAction(){

        // Checking a for a valid csrf token
        if ($this->request->isPost()) {
            if (!$this->security->checkToken()) {
                return;
            }
        }

        //get the login data from the post
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //an array to store all validation errors that occur
        $validationErrors = array();

        if(empty($username)){
            array_push($validationErrors, "Please enter your username");
        }
        if(empty($password)){
            array_push($validationErrors, "Please enter your password");
        }

        //check if a user with the supplied username is present in the database
        $user = User::findFirst([
            conditions => "username = ?1",
            bind => [1 => $username]
        ]);

        //if a user with the supplied username was found, check if the combination of password and username is valid
        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {

                //redirect to the admin home page
                return $this->response->redirect("/article");
            }
            else{
                array_push($validationErrors, "Incorrect username or password. Please try again.");

                //TODO implement the CRF something token, it looks prty easy(find it in cheatsheet security)
            }
        }
        //TODO display validation!
        return $this->response->redirect("/index");
    }

    public function createAction(){
        $user = new User();

        //for this assignment user registration wasn't mandatory so i create a test user manually
        $username = "michael";
        $password = "test";

        $user->username = $username;
        $user->password = $this->security->hash($password);

        $user->save();

        //for now just redirect to the homepage after inserting the demo user
        return $this->response->redirect("/index");
    }
}