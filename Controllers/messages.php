<?php
session_start();
if(!empty($_POST['msg'])){
     $msg=$_POST['msg'];
     // si le temp d'enregistrenment dans BD est moin 1h vous voulez ajouter 3600 n """date('Y-m-d h:i:s',time()+3600);"""
    $date=date('Y-m-d h:i:s',time());;
    if(isset($_SESSION["member_id"])){
     $userId = $_SESSION["member_id"];
     $messenger = new Messages(); 
     $messenger->setmessageFromPost($msg,$date,$userId);
     $stm =$messenger->addMessagesToDb();
     $_SESSION["msg"]=1;
    }else {
         echo "no member exist";
    }
    
    //print_r($stm->errorInfo());
    //print $err->errorCode();
    //echo $stm->errorInfo();
    }else{
         echo " post madazetch";
    }
    
    
