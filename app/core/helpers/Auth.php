<?php

class Auth {

    public static function attempt($email, $password) {

        $user = UserQuery::create()
            ->filterByEmail($email)
            ->findOne();

        if($user->getPassword() === Hash::make($password)) {
            Auth::login($user->getId());
            return true;
        }
    }

    public static function check() {
        if(Session::get('user_id') != null) {
            return true;
        }
    }

    public static function logout() {
        Session::set('user_id', null);
        Session::destroy();
        header('location: '.BASE_URL);
    }

    public static function user() {

        $user = UserQuery::create()->findPk(Session::get('user_id'));

        return $user;
    }

    private static function login($user_id) {
        // Setting the current user's id in the session.
        Session::set('user_id', $user_id);
    }

} 