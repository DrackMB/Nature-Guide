<?php



class Utilisateur {


    private $pseudo ;    

    private $motDePasse ;

    private $email ;

    private $nom ;

    private $prenom ;



    public function remplireInfoMember($pseudo, $motDePasse , $email ,$nom, $prenom) {
        $this->pseudo = $pseudo;
        $this->motDePasse = $motDePasse;
        $this->nom = $nom;
        $this->email = $email;
        $this->prenom = $prenom;

    }
    
    /**
     * Method creeCompt
     *
     * @param int $type [type de compte si simple user ou bien  super user ]
     *
     * @return void
     */
    public function creeCompt() {
        global $Db;
        $connection = $Db->connection();
        $sqlVeri = "SELECT pseudo FROM membres WHERE pseudo =:pseudo";
        $stm2 = $connection->prepare($sqlVeri);
        $stm2->execute(array(':pseudo' => $this->pseudo));
        if (empty($stm2->fetch(PDO::FETCH_ASSOC))) {
            $sql = "INSERT INTO membres(pseudo,nom,prenom,email,motDePasse) VALUES (?,?,?,?,?)";
            $stm = $connection->prepare($sql);
            $stm->execute([$this->pseudo,$this->nom,$this->prenom,$this->email,password_hash($this->motDePasse, PASSWORD_DEFAULT) ]);
            return 1;
        }else{
            return -1 ;//Quelqu'un utiliser ce email
        } 
            
    }
    
    /**
     * Method loging fait la connection  avec Ajax 
     *
     * @param String $pseudo [pseudo qui est envoyeé par post]
     * @param String  $motDepass [MDP qui est envoyeé par post ]
     *
     * @return int si le type de compte ou -1 qui signifie  MDP incorrect ou bien -2 pseudo incorrect
     */
    public static function loging($pseudo, $motDepass) {
        global $Db;
        $connection = $Db->connection();
        $sql = "SELECT id,pseudo,motDePasse FROM membres WHERE pseudo = :pseudo ";
        $stm = $connection->prepare($sql);
        $stm->execute(array(':pseudo' => $pseudo));
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        if (!empty($row)) {
                if (password_verify($motDepass, $row['motDePasse'])) {
                    return $row['id'];
                } else {
                    return -1;//Mot de passe incorrect
                }
            
        } else {
            return -2;//pseudo incorrect
        }
    }    
    /**
     * Method findUserByid
     *
     * @param int $id [Id de utilisateur ]
     *
     * @return Array les info de user  ou bien null si id n'existe pas
     */
    public static function findUserByid($idMembre){
        global $Db;
        $connection = $Db->connection();
        $sql = "SELECT pseudo FROM membres WHERE idMembre = :idMembre ";
        $stm = $connection->prepare($sql);
        $stm->execute(array(':idMembre' => $idMembre));
        return $stm;
    }

    public static function selectConnectUsers(){
        global $Db;
        $connection = $Db->connection();
        //// si le temp d'enregistrenment dans BD est moin 1h vous voulez ajouter 3600 n """date('Y-m-d h:i:s',time()+3600);"""
        $date2 = date('Y-m-d h:i:s',time());
        $date1 = date('Y-m-d h:i:s',time()-60);
        $sql = "SELECT pseudo FROM membres WHERE lastAction BETWEEN :date1 AND :date2";
        $stm = $connection->prepare($sql);
        $stm->execute(array(':date1' => $date1,':date2' => $date2));
        return $stm;    
    }

    public static function updateLastAction($idMembre , $date){
        global $Db;
        $connection = $Db->connection();
        $sql = "UPDATE membres SET lastAction= :date WHERE idMembre = :idMembre";
        $stm = $connection->prepare($sql);
        $stm->execute(array(':date'=>$date,':idMembre' => $idMembre));
        return $stm;

    }
    
    function getpseudo() {
        return $this->pseudo ;
    }

    function getmotDePasse() {
        return $this->motDePasse;
    }

    function setpseudo($pseudo ) {
        $this->pseudo  = $pseudo ;
    }

    function setmotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }
    
}
