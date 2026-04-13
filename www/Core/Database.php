<?php

namespace Core;

require_once __DIR__ . '/../config/config.php';

use PDO;
use PDOException;

class Database {
  private static ?PDO $instance = null;
  // Ensures the singleton
  private function __construct() {}
  private function __clone() {}

  public static function getInstance(): PDO {
    if(self::$instance === null) {
      try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        self::$instance = new PDO($dsn, DB_USER, DB_PASSWORD);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
      }
    }
    return self::$instance;
  }
}

// $db = Database::getInstance();