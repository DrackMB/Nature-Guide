<?php

$result = EspaceVertImage::findByEspaceImages(urldecode($urlId));
$row = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);
