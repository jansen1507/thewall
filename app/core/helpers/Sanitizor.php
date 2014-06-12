<?php
/**
 * Created by PhpStorm.
 * User: remeeh
 * Date: 06/06/14
 * Time: 03:18
 */

namespace TheWall\Core\Helpers;


class Sanitizor {
    public static function escapeHTML($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
}