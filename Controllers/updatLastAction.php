<?php
session_start();
if(isset($_SESSION["member_id"])){
   $id = $_SESSION["member_id"];
   $stm = Utilisateur::updateLastAction($id,date('Y-m-d h:i:s',time()));
   print_r($stm);

}