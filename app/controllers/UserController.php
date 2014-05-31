<?php

use TheWall\Helpers\URL;
use TheWall\Helpers\Auth;
use TheWall\Helpers\Hash;
use TheWall\Helpers\Notifier;
use TheWall\Helpers\Validator;

class UserController extends Controller {
    function getIndex() {
        URL::redirect('home');
    }
    function getLogin() {
        if(!Auth::check()) {
            $this->view->render('user/login');
        } else {
            URL::redirect('referer');
        }
    }
    function postLogin() {
        $email = (isset($_POST['email']) ? trim($_POST['email']) : '');
        $password = (isset($_POST['password']) ? trim($_POST['password']) : '');

        // Login with auth

        if(!Auth::attempt($email, $password)) {
            // else, set notification and return to login
            Notifier::add('warning', "We couldn't log you in with what you just entered. Please try again.");
        }
        URL::redirect('home');
    }
    function postCreate() {
        if(!Auth::check()) {
            // get + trim vars
            $email = (isset($_POST['email']) ? trim($_POST['email']) : false);
            $password = (isset($_POST['password']) ? trim($_POST['password']) : false);

            // Validation

            if(Validator::check(array(
                'email' => $email,
                'password' => $password
            ))) {

                $user = new User();
                $user->setEmail($email);
                $user->setPassword(Hash::make($password));

                // Persist user.
                if($user->save()) {
                    Notifier::add('success', 'Congratulations, your user has been created, now login with your new credentials.');
                } else {
                    Notifier::add('danger', 'Something went wrong while trying to create your account. :(');
                }

            }
        }

        URL::redirect('home');
    }

    function getLogout() {
        Auth::logout();
    }
} 