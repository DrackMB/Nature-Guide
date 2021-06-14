<?php


class EspaceVert
{

    private $id;
    private $libelle;
    private $lets;
    private $ing;
    private $ville;
    private $discription;
    private $imagePath;
    private $temperature;

    /**
     * EspaceVert constructor.
     * @param $libelle
     * @param $lets
     * @param $ing
     * @param $ville
     * @param $discription
     * @param $imagePath
     * @param $temperature
     */
    public function remplireEspaceVerte($libelle, $lets, $ing, $ville, $discription, $imagePath, $temperature)
    {
        $this->libelle = $libelle;
        $this->lets = $lets;
        $this->ing = $ing;
        $this->ville = $ville;
        $this->discription = $discription;
        $this->imagePath = $imagePath;
        $this->temperature = $temperature;
    }


    public function insererEspaceVert() {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle FROM espace_vert where lets =:lets and ing=:ing";
        $stm2 = $connection->prepare($sqlVeri);
        $stm2->execute(array(':lets' => $this->lets,':ing'=>$this->ing));
        if (empty($stm2->fetch(PDO::FETCH_ASSOC))) {
            $ville = Ville::findByLibelle($this->ville);
            if($ville!=-1){
               $result=$ville->fetch(PDO::FETCH_OBJ);
                $sql = "INSERT INTO espace_vert(libelle,lets,ing,id_ville,description,image, temperature) VALUES (?,?,?,?,?,?,?)";
                $stm = $connection->prepare($sql);
                $stm->execute([$this->libelle,$this->lets,$this->ing,$this->result->id,$this->discription,$this->imagePath,$this->temperature]);
                return 1;
            }
        }else{
            return -1 ;//Ville Deja existe
        }

    }

    public static function findAll() {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle,lets,ing,id_ville,description,image, temperature FROM espace_vert ";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute();
        return $stm1;
    }

    public static function findByLibelle($libelle) {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle,lets,ing,id_ville,description,image, temperature FROM ville where libelle = :libelle";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute(array(':libelle'=>$libelle));
        if(empty($stm1->fetch(PDO::FETCH_ASSOC))){
            return -1;
        }
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
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getDiscription()
    {
        return $this->discription;
    }

    /**
     * @param mixed $discription
     */
    public function setDiscription($discription)
    {
        $this->discription = $discription;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param mixed $temperature
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

}