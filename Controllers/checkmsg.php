<?php
session_start();
if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
}else echo 0 ;
