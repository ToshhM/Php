
<?php

require "Database.php";

class Categorie {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM categorie");
    }

    public function getOne($id)
    {
        $this->db->query(
            "SELECT * FROM categorie 
            WHERE id = " . $id, true);
    }

    public function save($param)
    {
        $statement = "INSERT INTO categorie (name) VALUES (:name)";
        $this->db->prepare($statement, $param);
    }
}