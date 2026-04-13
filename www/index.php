<?php
session_start();
date_default_timezone_set('Europe/Paris');

require_once __DIR__ . '/Core/Autoloader.php';

function h($str) {
    return \helpers\StringUtils::h($str);
}

use Core\Router;

$router = Router::getInstance();

// Home
$router->get('/', 'HomePageController@getHomePage');

// Auth
$router->get('/login', 'AuthController@loginForm');
$router->post('/login/submit', 'AuthController@loginSubmit');
$router->get('/signup', 'AuthController@signupForm');
$router->post('/signup/submit', 'AuthController@signupSubmit');
$router->get('/logout', 'AuthController@logout');

// Users
$router->get('/admin/users', 'AdminUserController@listUsers');
$router->get('/admin/users/delete', 'AdminUserController@deleteUser');
$router->get('/admin/users/modify-user-role', 'AdminUserController@viewModifyRole');
$router->post('/admin/users/modify-user-role', 'AdminUserController@modifyRole');

// Pages
$router->get('/admin/pages', 'AdminPageController@listPages');
$router->get('/page/{slug}', 'AdminPageController@viewPage');
$router->get('/admin/new-page', 'AdminPageController@viewNewPage');
$router->post('/admin/create-new-page', 'AdminPageController@createNewPage');
$router->get('/admin/delete-page', 'AdminPageController@deletePage');
$router->get('/admin/update-page-view', 'AdminPageController@viewPageToUpdate');
$router->post('/admin/update-page', 'AdminPageController@updatePage');

$router->dispatch();