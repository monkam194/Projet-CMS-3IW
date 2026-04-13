<?php

namespace helpers;

use Models\UserModel;

class Auth {

  public static function checkAuth() {
    if(!isset($_SESSION['user'])) {
      header("Location: /login");
      exit;
    }
  
    $userModel = UserModel::getInstance();
    $user = $userModel->getUserById($_SESSION['user']['id']);
  
    if(!$user || $user['is_verified'] !== 1) {
      session_destroy();
      // header("Location: /login");
      echo "Veuillez confirmer votre adresse mail afin de voir nos pages";
      exit;
    }
  }

  public static function checkAdmin() {
    if(!isset($_SESSION['user'])) {
      header("Location: /login");
      exit;
    }
    $userModel = UserModel::getInstance();
    $user = $userModel->getUserById($_SESSION['user']['id']);
    if($user['role'] !== "ADMIN") {
      echo " 404 not found";
      exit;
    }
  }

  public static function checkRole($role) {
    if(!isset($_SESSION['user'])) {
      header("Location: /login");
      exit;
    }
    $userModel = UserModel::getInstance();
    $user = $userModel->getUserById($_SESSION['user']['id']);
    if(!in_array($user['role'], $role)) {
      echo "404 not found";
      exit;
    }
  }

}

