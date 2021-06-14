<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//recuperation du fichier de configuration du site.
require_once 'Config/conf.inc.php';
require_once 'Config/autoload.php';

// Connexion à la BdD
$Db = new DbTools();

//Recupération de l'URI du site pour le parsser et récupérer la page à afficher et les variables
$url = $_SERVER['REQUEST_URI'];

//parse_str($url, $output);
$pageInfos = explode('/',$url);
//$pageTest = $_GET['page'];
//Recuperation de la variable page de l'url
$page = $pageInfos[1];
$urlId = (isset($pageInfos[2]))? $pageInfos[2] : null;


/* 
if($page !=""){
    if(strpos($page, ".php")){
        $pageName = $page ;
    } else {
        $pageName = $page.'.php';
    } 
    
}
 else {
    $pageName = 'accueil.php';     
} */
$pageName = ($page != '')? $page.'.php' : 'accueil.php';
if(file_exists ('Controllers/'.$pageName)){
include_once 'Controllers/'.$pageName;
}
else{
    $pageName= "erreur404.php";
    include_once 'Controllers/erreur404.php';
}

