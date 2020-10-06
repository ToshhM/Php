<?php

var_dump($_GET);
$page =ucfirst($GET["page"]);
require $page.".php";
$class= new $page();


 switch ($_SERVER["REQUEST_METHOD"]){
    case 'GET':
    if(key_exists("id",$_GET)){ 
    $class->geyOne($_GET["id"]);
    }else{
    $class->getAll();
    } break;
    case 'POST':
    $class->save($_POST);
    break;
    case 'PUT';
    break;
default:
#code 
break;
}
/*
$user ='root';
$pass ='root';

$pdo = new PDO('mysql:host=localhost:8889;dbname=blog', $user, $pass);

$statement = $pdo->query("SELECT * FROM categorie");
$result = $statement->fetchAll();

header('content-type:application/json');
echo json_encode($result);



try {
    $statement = $pdo->prepare("INSERT INTO categorie (name) VALUES (:name)");
    $statement->execute([":name" => $_POST["name"]]);

    $result["success"]= true;
    $result["message"]= "Categorie enregistrée";
    $result["data"] = array();
    echo json_encode($result);
} catch (\Throwable $th) {
    $result["success"]= false;
    $result["message"]= "Erreur";
    $result["data"] = array();
    echo json_encode($result);
}