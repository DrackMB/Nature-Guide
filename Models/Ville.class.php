<?php


class ville
{

    private $id;
    private $libelle;
    private $lets;
    private $ing;
    private $etat;

    public function remplireInfoMember($libelle, $lets,$ing,$etat) {
        $this->libelle = $libelle;
        $this->lets = $lets;
        $this->ing = $ing;
        $this->etat = $etat;
    }

    public function insererVille() {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle,lets,ing,Etat FROM ville where lets =:lets and ing=:ing";
        $stm2 = $connection->prepare($sqlVeri);
        $stm2->execute(array(':lets' => $this->lets,':ing'=>$this->ing));
        if (empty($stm2->fetch(PDO::FETCH_ASSOC))) {
            $sql = "INSERT INTO ville(libelle, lets, ing, Etat) VALUES (?,?,?,?)";
            $stm = $connection->prepare($sql);
            $stm->execute([$this->libelle,$this->lets,$this->ing,$this->etat]);
            return 1;
        }else{
            return -1 ;//Ville Deja existe
        }

    }

    public static function findAll() {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT libelle,lets,ing,Etat FROM ville ";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute();
        return $stm1;

    }

    public static function findByLibelle($libelle) {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT id,libelle,lets,ing,Etat FROM ville where libelle = :libelle";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute(array(':libelle'=>$libelle));
        if(empty($stm1->fetch(PDO::FETCH_ASSOC))){
            return -1;
        }
        return $stm1;
    }
    public static function findByID($Id) {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT id,libelle,lets,ing,Etat FROM ville where id = :id";
        $stm1 = $connection->prepare($sqlVeri);
        $stm1->execute(array(':id'=>$Id));
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
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }



}