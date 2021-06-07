<?php


class Messages {

               
    private $message;    
    
    private $date;    
    
    private $idMembre ;
    
    
    public function setmessageFromPost($message  ,$date, $idMembre ) {

        $this->message = $message ;
        $this->date = $date;
        $this->idMembre  = $idMembre ;

    }

   
    public function addMessagesToDb() {
        global $Db;
        $connection = $Db->connection();
        $sql = "INSERT INTO messages (message, date, idMembre) VALUES (?,?,?)";
        $stm = $connection->prepare($sql);
        $stm->execute(array($this->message,$this->date,$this->idMembre));
        return $stm;  
    }
    
    public static function getMessageFromBD() {
        global $Db;
        $connection = $Db->connection();
        // si le temp d'enregistrenment dans BD est moin 1h vous voulez ajouter 3600 n """date('Y-m-d h:i:s',time()+3600);"""
        $date2 = date('Y-m-d h:i:s',time());
        $date1 = date('Y-m-d h:i:s',time()-3);
        //$sql = "SELECT idMessage,message,date,pseudo FROM messages INNER JOIN membres on messages.idMembre=membres.idMembre ORDER BY idMessage  DESC LIMIT 1";
        $sql = "SELECT idMessage,message,date,pseudo FROM messages INNER JOIN membres on messages.idMembre=membres.idMembre where date BETWEEN :date1 AND :date2";
        $stm = $connection->prepare($sql);
        $stm->execute(array(':date1' => $date1,':date2' => $date2));
        return $stm;
    }

    public static function getALLMessageFromBD() {
        global $Db;
        $connection = $Db->connection();
        $sql = "SELECT message,date,pseudo FROM messages INNER JOIN membres on messages.idMembre=membres.idMembre";
        $stm = $connection->prepare($sql);
        $stm->execute();
        return $stm;
    }

    
    function getMessage() {
        return $this->message ;
    }

    function getDate() {
        return $this->date;
    }

    function getIdMembre() {
        return $this->idMembre;
    }

    function setMessage($message ) {
        $this->message  = $message ;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setIdMembre($idMembre ) {
        $this->idMembre  = $idMembre ;
    }

    

}
