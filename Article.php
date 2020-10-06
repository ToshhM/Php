<?php

require "Database.php";

class Article {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM article");
    }

    public function getOne($id)
    {
        $this->db->query(
            "SELECT * FROM article 
            WHERE id = " . $id, true);
    }

    public function save($param)
    {
        $statement = "INSERT INTO article (title, content, categorie_id) VALUES (:title, :content, :categorie_id)";
        $this->db->prepare($statement, $param);
    }
}