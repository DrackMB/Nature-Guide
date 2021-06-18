<?php

$result = Ville::findAll();
$row=$result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);