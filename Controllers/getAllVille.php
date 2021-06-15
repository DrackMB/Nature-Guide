<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


$result = Ville::findAll();
$row=$result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);