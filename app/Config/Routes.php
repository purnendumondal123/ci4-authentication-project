<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;

/** @var RouteCollection $routes */
// $routes->get('/', 'Home::index');
$routes->match(['get','post'],'/', 'LoginController::index',['as' => 'login', 'filter'=> 'noauth']);

// $routes->get('/signup', 'LoginController::signup',['filter' => 'noauth']);
$routes->match(['get','post'], 'signup', 'LoginController::signup', ['as' => 'signup','filter' => 'noauth']);

$routes->match(['get','post'],'verify-otp','LoginController::verifyOtp');

$routes->get('logout', 'LoginController::logout');

$routes->match(['get','post'],'forgot_password', 'LoginController::forgot_password',['as' => 'forgotPassword']);

$routes->match(['get','post'], 'reset-password/(:any)', 'LoginController::resetPassword/$1');


// $routes->get('dashboard','LoginController::dashboard', ['filter' => 'auth']);

$routes->get('home', [Home::class, 'index'],['as'=>'home', 'filter' => 'auth']);

$routes->get('about', [Home::class, 'about'],['as'=>'about', 'filter' => 'auth']);

$routes->get('contact', [Home::class, 'contact'],['as'=>'contact', 'filter' => 'auth']);

$routes->match(['get', 'post'], 'upload-image', [Home::class,'uploadImage'], ['as'=> 'upload-image','filter' => 'auth']);