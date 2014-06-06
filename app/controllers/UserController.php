<?php

use TheWall\Core\Helpers;

class UserController extends Controller {

    function postLogin() {
        $email = (isset($_POST['email']) ? trim($_POST['email']) : '');
        $password = (isset($_POST['password']) ? trim($_POST['password']) : '');

        // Login with auth

        if(!Helpers\Auth::attempt($email, $password)) {
            // else, set notification and return to login
            Helpers\Notifier::add('warning', "We couldn't log you in with what you just entered. Please try again.");
        }
        Helpers\URL::redirect('home');
    }
    function postCreate() {

        // get + trim vars
        $email = (isset($_POST['email']) ? trim(Helpers\Sanitizor::escapeHTML($_POST['email'])) : false);
        $username = (isset($_POST['username']) ? trim(Helpers\Sanitizor::escapeHTML($_POST['username'])) : false);
        $password = (isset($_POST['password']) ? trim($_POST['password']) : false);

        // Validation

        if(Helpers\Validator::check(array(
            'email' => $email,
            'password' => $password,
            'username' => $username
        ))) {

            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword(Helpers\Hash::make($password));


            // Persist user.
            if($user->save()) {
                Helpers\Notifier::add('success', 'Congratulations, your user has been created, now login with your new credentials.');
            } else {
                Helpers\Notifier::add('danger', 'Something went wrong while trying to create your account. :(');
            }

        }

        Helpers\URL::redirect('home');
    }

    function getLogout() {
        Helpers\Auth::logout();
    }
} 