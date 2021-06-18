<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $espaceVert = new EspaceVert();
    $espaceVert->remplireEspaceVerte($request->libelle, $request->lets, $request->ing, $request->ville->libelle, $request->disciption, $request->image);
    $res = $espaceVert->insererEspaceVert();
    echo $res;
}