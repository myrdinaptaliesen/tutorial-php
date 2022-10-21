<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=listecourses;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
if ($_POST) {
    $nomCategorie = $_POST['nomCategorie'];
    if ($nomCategorie != "") {
        $req1 = $pdo->prepare("
        INSERT INTO Categories(nomCategorie)
        VALUES (:nomCategorie)
 ");

        $req1->execute(array(
            ':nomCategorie' => $nomCategorie
        ));
    }
}
header('location:categories.php');
