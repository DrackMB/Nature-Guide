<?php


class ville
{

    private $id;
    private $libelle;
    private $lets;
    private $ing;
    private $depart;
    private $image;
    private $numVille;
    private $pollutionKey;

    public function remplireInfoVille($libelle, $lets,$ing,$depart,$image,$numVille,$pollutionKey) {
        $this->libelle = $libelle;
        $this->lets = $lets;
        $this->ing = $ing;
        $this->depart = $depart;
        $this->image=$image;
        $this->numVille=$numVille;
        $this->pollutionKey=$pollutionKey;
    }

    public function insererVille() {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle,lets,ing,depart FROM ville where lets =:lets and ing=:ing";
        $stm2 = $connection->prepare($sqlVeri);
        $stm2->execute(array(':lets' => $this->lets,':ing'=>$this->ing));
        if (empty($stm2->fetch(PDO::FETCH_ASSOC))) {
            $sql = "INSERT INTO ville(libelle, lets, ing, depart,image,numVille,pollutionKey) VALUES (?,?,?,?,?,?,?)";
            $stm = $connection->prepare($sql);
            $stm->execute([$this->libelle,$this->lets,$this->ing,$this->depart,$this->image,$this->numVille,$this->pollutionKey]);
            return 1;
        }else{
            return -1 ;//Ville Deja existe
        }

    }

    public static function findAll() {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT * FROM ville ";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute();
        return $stm1;

    }

    public static function findByLibelle($libelle) {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT id,libelle, lets, ing, depart,image,numVille,pollutionKey FROM ville where libelle = :libelle";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute(array(':libelle'=>$libelle));
        return $stm1;
    }
    public static function findByID($Id) {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle, lets, ing, depart,image,numVille,pollutionKey FROM ville where id = :id";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute(array(':id'=>$Id));
        return $stm1;
    }

    public static function findBydept($depart) {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle, lets, ing, depart,image,numVille,pollutionKey FROM ville where depart = :depart";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute(array(':depart'=>$depart));
        return $stm1;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getLets()
    {
        return $this->lets;
    }

    /**
     * @param mixed $lets
     */
    public function setLets($lets)
    {
        $this->lets = $lets;
    }

    /**
     * @return mixed
     */
    public function getIng()
    {
        return $this->ing;
    }

    /**
     * @param mixed $ing
     */
    public function setIng($ing)
    {
        $this->ing = $ing;
    }

    /**
     * @return mixed
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * @param mixed $depart
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getNumVille()
    {
        return $this->numVille;
    }

    /**
     * @param mixed $numVille
     */
    public function setNumVille($numVille)
    {
        $this->numVille = $numVille;
    }

    /**
     * @return mixed
     */
    public function getPollutionKey()
    {
        return $this->pollutionKey;
    }

    /**
     * @param mixed $pollutionKey
     */
    public function setPollutionKey($pollutionKey)
    {
        $this->pollutionKey = $pollutionKey;
    }



}