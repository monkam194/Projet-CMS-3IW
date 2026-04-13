<?php

namespace Controllers;

use Core\Controller;

class HomePageController extends Controller {
    public function getHomePage() {
        $this->render('page/homePage', ['title' => 'Accueil']);
    }
}