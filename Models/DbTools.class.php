<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbTouls
 *
 * @author dell ( Mouad Boussaid)
 */

class DbTools {

    //put your code here

    public $Host;
    public $Dbname;
    public $Username;
    public $Password;
    public $Dns;
    public $Connection = NULL; //$Db

    private function connect() {
        // Connection principale à la base donn�es
        try {
            $this->Connection = new PDO($this->Dns, $this->Username, $this->Password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }


        return true;
    }

     
    /**
     * Apliquer les requets 
     *
     * @param $Query $Query [explicite description]
     * @param $showError $showError [explicite description]
     *
     * @return void
     */
    public function query($Query, $showError = true) {

        $ResultSet = $this->Connection->query($Query);

        if ($ResultSet === FALSE && $showError === true) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->Connection->errorInfo());
        } else {
            return $ResultSet;
        }
    }

    public function connection() { 
            return $this->Connection;
    }

    public function simpleQuery($sql) {

        /* Execution d'une requette sans avoir d'objet en retour mais uniquement 
          le nombre de ligne affectée */
        $count = $this->Connection->exec($sql);
    }

    public function getLastId() {

        return $this->Connection->lastInsertId();
    }

    public function __construct() {
        $this->Host = DATABASE_HOST;
        $this->Dbname = DATABASE_NAME;
        $this->Username = DATABASE_USERNAME;
        $this->Password = DATABASE_PASSWORD;
        $this->Dns = "mysql:dbname=$this->Dbname;host=$this->Host;charset=utf8mb4";
        $this->connect();

        return true;
    }

}
