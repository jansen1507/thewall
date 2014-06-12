<?php
namespace TheWall\Core\Helpers;

class Observer {
    public static function log($fileName, $event) {
        $file = __SITE_PATH.'logs/'.$fileName.'.txt';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $time = date('d-m-y - H:i:s');

        $user_id = (isset($_SESSION['user_id']) ? Session::get('user_id') : 'Unknown');

        $data = "\nTime[{$time}] : Event[{$event}] : UserId[{$user_id}] : IP[{$ip}]";

        if (!is_dir(__SITE_PATH.'logs')) {
            mkdir(__SITE_PATH.'logs', 0755, true);
        }

        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    }

}