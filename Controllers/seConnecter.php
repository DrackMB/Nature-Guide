<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $result = Utilisateur::loging($request->pseudo,$request->motDePasse);
    echo $result;
}
