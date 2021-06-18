<?php

$result = EspaceVert::findByVilleLibelle($urlId);
$row = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);