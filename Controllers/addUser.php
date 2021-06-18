<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $user = new Utilisateur();
    $user->remplireInfoMember($request->pseudo,$request->motDePasse,$request->email,$request->nom,$request->prenom);
    $result=$user->creeCompt();
    echo $result;
}
