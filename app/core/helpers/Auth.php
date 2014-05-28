<?php

class Auth {

    public static function attempt($email, $password) {

        $db = new Database();

        try {
            $stmt = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
            $stmt->execute(array(':email' => $email, ':password' => Hash::make($password)));
        } catch (PDOException $e) {
            throw $e;
        }

        $count = $stmt->rowCount();
        $user_id = $stmt->fetchColumn(0);

        // closing connection
        $db = null;

        if($count==1) {
            Auth::login($user_id);
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

    public static function user($property) {

        $db = new Database();

        try {
            $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
            $stmt->execute(array(':id' => Session::get('user_id')));
        } catch (PDOException $e) {
            throw $e;
        }

        $result = $stmt->fetch();

        $db = null;

        return $result[$property];
    }

    private static function login($user_id) {
        // Setting the current user's id in the session.
        Session::set('user_id', $user_id);
    }

} 