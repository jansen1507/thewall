<?php 
class Migrations {
    private $db;
    function __construct($db) {
        $this->db = $db;
    }
    public function run() {

        $this->db->query("

            DROP TABLE IF EXISTS `users`;
            CREATE TABLE IF NOT EXISTS `users` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `email` varchar(100) NOT NULL,
              `password` varchar(225) NOT NULL,
              PRIMARY KEY (`id`)
            );

            ");

    }
}