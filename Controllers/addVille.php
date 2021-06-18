<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $ville = new Ville();
    $ville->remplireInfoVille($request->libelle, $request->lets, $request->ing, $request->depart, $request->image, $request->numVille, $request->pollutionKey);
    $res= $ville->insererVille();
    echo $res;

}