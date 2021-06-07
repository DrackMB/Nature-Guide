<?php
session_start();
if(!empty($_POST['pseudo'])){
    $pseudo=$_POST['pseudo'];
    $motDePasse=$_POST['motDePasse'];
    $connecter = Utilisateur::loging($pseudo,$motDePasse); 
    if($connecter >= 1){
        $_SESSION["member_id"]= $connecter;
        echo $connecter;
    }else echo $connecter;
    //$stm =$messenger->addMessagesToDb();
    //print_r($stm->errorInfo());
    //print $err->errorCode();
    //echo $stm->errorInfo();
    
}else echo "Post est vide ";  
 

