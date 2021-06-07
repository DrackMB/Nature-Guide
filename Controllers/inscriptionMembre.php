<?php
session_start();
if(!empty($_POST['pseudo'])){
    $pseudo=$_POST['pseudo'];
    $motDePasse=$_POST['motDePasse'];
    $member = new Utilisateur(); 
    $member->remplireInfoMember($pseudo,$motDePasse);
    $result = $member->creeCompt();
    if($result == 1){
       $id = Utilisateur::loging($pseudo,$motDePasse);
       $_SESSION["member_id"]= $id;
       echo $id;
    }else
    echo $result;

}