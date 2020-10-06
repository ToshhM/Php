<?php

class Database {

    private $user = "root";
    private $pwd = "root";
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost:8889;dbname=blog',
                         $this->user,
                          $this->pwd);
        
    }

    public function query($statement, $one = false){

        try {
            
            $statement = $this->pdo->query($statement, PDO::FETCH_OBJ);

            if ($one) {
                $data = $statement->fetch();
            } else {
                $data = $statement->fetchAll();
            }
            $this->sendData("Données récupérées", true, $data);

        } catch (\Throwable $th) {
            $this->sendData("Impossible de récupérer les données");
        }
    }

    public function prepare($statement, $param = array())
    {
        try {
            $statement = $this->pdo->prepare($statement);
            $statement->execute($param);

            $this->sendData("Enregistrement ok", true);
        } catch (\Throwable $th) {
            $this->sendData("Erreur lors de l'enregistrement");
        }
    }

    private function sendData($message, $success= false, $data = array())
    {
        $result["success"] = $success;
        $result["message"] = $message;
        $result["data"] = $data;

        header('content-type:application/json');
        echo json_encode($result);
    }
}

