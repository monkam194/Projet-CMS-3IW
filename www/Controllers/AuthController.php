<?php

namespace Controllers;

use Core\Controller;
use Models\UserModel;
use helpers\checkInputs;

class AuthController extends Controller {

    public function signupForm() {
        require __DIR__ . '/../Views/Auth/signup.php';
    }

    public function signupSubmit() {
        if (!checkInputs::isValidEmail($_POST['email'] ?? '')) {
            echo "Email invalide";
            return;
        }

        if (!checkInputs::isSafePassword($_POST['password'] ?? '')) {
            echo "Mot de passe trop faible";
            return;
        }

        $userModel = UserModel::getInstance();

        if (!$userModel->isEmailUnique($_POST['email'])) {
            echo "Email déjà utilisé";
            return;
        }

        // Account validated immediately to speed up the process
        $userModel->createUser($_POST['email'], $_POST['password'], 1, '0');

        header("Location: /login");
        exit;
    }

    public function loginForm() {
        require __DIR__ . '/../Views/Auth/login.php';
    }

    public function loginSubmit() {
        $userModel = UserModel::getInstance();
        $user = $userModel->getUserByEmail($_POST['email'] ?? '');

        if (!$user || !password_verify($_POST['password'] ?? '', $user['password'])) {
            echo "Échec connexion";
            return;
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'role' => $user['role'],
            'email' => $user['email']
        ];

        header("Location: /");
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: /");
        exit;
    }
}