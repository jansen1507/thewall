<?php
class UserController {
    function getIndex() {
        URL::redirect('home');
    }
    function getLogin() {
        if(!Auth::check()) {
            $this->view->render('user/login');
        } else {
            // TODO: update URL helper to accept referer arg.
            // URL::redirect('referer');
        }
    }
    function postLogin() {
        $email = (isset($_POST['email']) ? trim($_POST['email']) : '');
        $password = (isset($_POST['password']) ? trim($_POST['password']) : '');

        // Login with auth

        if(Auth::attempt($email, $password)) {
            URL::redirect('home');
        } else {
            // else, set notification and return to login
            Notifier::add('warning', "We couldn't log you in with what you just entered. Please try again.");
            URL::redirect('user/login');
        }
    }
    function postCreate() {
        if(!Auth::check()) {
            // get + trim vars
            $email = (isset($_POST['email']) ? trim($_POST['email']) : false);
            $password = (isset($_POST['password']) ? trim($_POST['password']) : false);

            // Validation

            if(Validator::check(array(
                'password' => $password,
                'email' => $email
            ))) {

                $user = new User();

                // Persist data.
                // $user->save();

                Notifier::add('success', 'Congratulations, your user has been created, now login with your new credentials.');
            }
        }

        URL::redirect('home');
    }

    function getLogout() {
        Auth::logout();
    }
} 