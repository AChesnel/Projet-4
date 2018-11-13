<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
session_start();
require('controller/articlesFrontend.php');
require('controller/userFrontend.php');
require('routes.php');

// on recupère la demande du l'internaute (la page demandée)
if(isset($_GET['action'])) {
    $myvar = $_GET['action'];
} else {
    $myvar = 'displayHome';
}

if(  key_exists($myvar, $routes)   ) {
   $controller = new $routes[$myvar]['controller'];
   $method     = $routes[$myvar]['method'];
   (isset($routes[$myvar]['firewall'])) ? $firewall = 1 : $firewall = 0;

   // test si besoin de firewall
   if($firewall == 1) {
        // test si loggé
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            $controller->$method();
        } else {
            echo 'non autorisé';
        }
   } else {
        $controller->$method();
   }

} else {
    echo 'page 404';
}