<?php
session_start();
if(empty($urlId)){
     $result = Messages::getMessageFromBD();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if(empty($row)){
        echo "0";
    }else echo json_encode($row); 
    
    
}else{
    $result = Messages::getALLMessageFromBD();
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($row);
}



