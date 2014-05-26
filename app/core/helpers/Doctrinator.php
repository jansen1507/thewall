<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __SITE_PATH."vendor/autoload.php";

class Doctrinator {
    public static function getEntityManager() {
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(array(__SITE_PATH."app/models/concrete"), $isDevMode);

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'internatus'
        );

        return EntityManager::create($dbParams, $config);
    }
}