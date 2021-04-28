<?php

/**
* Singleton to create a database connection instance
*/

class Database {
    // Database credentials
    private $db = [
        'name'     => 'hippibank',
        'username' => 'root',
        'password' => '',
    ];

    private static $instance = null;
    private $connection;

    protected function __construct() {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=' . $this->db['name'], $this->db['username'], $this->db['password'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);
        } catch (PDOException $e) {
            die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}