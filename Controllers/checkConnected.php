<?php
session_start();
if(isset($_SESSION["member_id"])){
    echo $_SESSION["member_id"];
}else echo -1;
