<?php


class EspaceVertImage
{
    private $id;
    private $imageUrl;

    public static function findByEspaceImages($libelle) {
        global $Db;
        $connection = $Db->connection();
        $result = EspaceVert::findByLibelle($libelle);
        $row =$result->fetch(PDO::FETCH_OBJ);
        $espaceID = $row->id;
        $sqlVeri = "SELECT espace_vert_image.image_url FROM espace_vert_image INNER JOIN espace_vert ON espace_vert.id = espace_vert_image.id_espace_vert where espace_vert.id=:espaceID";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute(array(':espaceID'=>$espaceID));
        return $stm1;
    }
}