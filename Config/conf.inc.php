<?php
// Désactiver le rapport d'erreurs
//error_reporting(0);
//error_reporting(E_ALL);

// desactive la limite de temps d'execution d'un traitement par PHP
ini_set('max_execution_time', 0);
//Remplace le & situé apres la valeur de la session dans les url par le code html &amp;
ini_set('arg_separator.output', '&amp;');
//recuperation du domaine
$domaine = $_SERVER['HTTP_HOST'];
$documment= $_SERVER['DOCUMENT_ROOT'];
// Administrateur principal du site
define('MAIL_ADMIN' , '');
// Responsable technique du serveur
define('MAIL_WEBMASTER' , '');    
//Racine du site
define('DOC_ROOT' ,$documment.'/Messenger/');

define('URL_ROOT' , 'http://'.$domaine);
//Definition du chemin d'accès CSS
define('PATH_CSS',URL_ROOT.'/public/css');
//Definition du chemin d'accès JavaScript
define('PATH_JS',URL_ROOT.'/public/javaScript');
//Definition du chemin d'accès aux images
define('REP_IMAGES',URL_ROOT.'/public/images');
//Chemin d'accès aux fichiers des articles
define('REP_IMAGES_ARTICLE',REP_IMAGES.'/articles');
//Definition du chemin d'accès aux images
define('REP_VIDEO',URL_ROOT.'/public/videos');
//Definition du chemin d'accès aux classes
define('DIR_PHP_CLASS','Models');

//configuration de la BDD

define('DATABASE_HOST' , '127.0.0.1');
define('DATABASE_TYPE' , 'mysql');
define('DATABASE_NAME' , 'natureguide');
define('DATABASE_USERNAME' , 'root');
define('DATABASE_PASSWORD' , '');  

