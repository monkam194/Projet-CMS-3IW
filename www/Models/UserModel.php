<?php

namespace Models;

use Core\Database;

class UserModel {
  private static $instance = null;
  private $db;
  private function __clone() {}

  private function __construct() {
    $this->db = Database::getInstance();
  }

  public static function getInstance() {
    if(self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function createUser($email, $password, $verified, $token) {
    $preRequest = $this->db->prepare("INSERT INTO users (email, password, is_verified, verification_token) VALUES (?, ?, ?, ?)");
    return $preRequest->execute([
      $email,
      password_hash($password, PASSWORD_DEFAULT),
      $verified,
      $token
    ]);
  }

  public function isEmailUnique($email) {
    $preReq = $this->db->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
    $preReq->execute([$email]);
    return !$preReq->fetch();
  }

  public function verifyEmailByToken($token) {
    $preReq = $this->db->prepare("UPDATE users SET is_verified = 1, verification_token = 0 WHERE verification_token = ?");
    $preReq->execute([$token]);
    return $preReq->rowCount() > 0;
  }

  public function getUserByEmail($email) {
    $preRequest = $this->db->prepare("SELECT * FROM users where email = ?");
    $preRequest->execute([$email]);
    return $preRequest->fetch();
  }

  public function getAllUsers() {
    $preRequest = $this->db->prepare("SELECT id, email, role FROM users");
    $preRequest->execute();
    return $preRequest->fetchAll();
  }

  public function deleteUser($id) {
    $preRequest = $this->db->prepare("DELETE FROM users where id = ? AND id != 5");
    $preRequest->execute([$id]);
  }

  public function getUserById($id) {
    $preReq = $this->db->prepare("SELECT * FROM users WHERE id = ?");
    $preReq->execute([$id]);
    return $preReq->fetch();
  }

    public function findUserByEmail($email) {
    $preReq = $this->db->prepare("SELECT * FROM users WHERE email = ?");
    $preReq->execute([$email]);
    return $preReq->fetch();
  }

  public function saveResetToken($userId, $token) {
    $preReq = $this->db->prepare("UPDATE users SET verification_token = ? where id =?");
    $preReq->execute([$token, $userId]);
  }

  public function resetPasswordByToken($token, $newPassword) {
    $preReq = $this->db->prepare("SELECT * FROM users WHERE verification_token = ?");
    $preReq->execute([$token]);
    $user = $preReq->fetch();
    if(!$user) {
      return false;
    }
    $hashedpsw = password_hash($newPassword, PASSWORD_DEFAULT);
    $update = $this->db->prepare("UPDATE users SET password= ?, verification_token = 0 WHERE verification_token = ?");
    $update->execute([$hashedpsw, $token]);
    return true;
  }

  public function findByEmailAndUpdateRole($email, $role) {
    $preReq = $this->db->prepare("UPDATE users SET role = ? WHERE email = ? AND id != 5");
    $preReq->execute([$role, $email]);
  }
}