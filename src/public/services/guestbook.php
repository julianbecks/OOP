<?php
class Guestbook{

    public $conn;
    public $conn2;

    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=Gaestebuch", "root", "");
        $this->conn2 = new PDO("mysql:host=localhost;dbname=clans", "root", "");
        
    }

    public function insert(NewEntry $entry){
        $sql = "INSERT INTO Gaestebuch(Vorname, Nachname, Stadt, Inhalt) VALUES(:FN, :LN, :City, :Text)";
        $pdoResult = $this->conn->prepare($sql);
        $pdoExec = $pdoResult->execute(array(":FN" => $entry->getFirstname(), ":LN" => $entry->getLastname(), ":City" => $entry->getCity(), ":Text" => $entry->getContent()));
    }

    public function delete($id){
        $sql = "DELETE FROM Gaestebuch WHERE Eintrag = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
    }

    public function select(){
        $sql = "SELECT * FROM Gaestebuch";   
        return $this->conn->query($sql)->fetchAll();
    }

    public function clans(){
        $sql2 = "SELECT * FROM claninfo";
        return $this->conn2->query($sql2)->fetchAll();

    }
}