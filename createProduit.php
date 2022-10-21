<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=listecourses;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_POST) {
    $nomProduit = $_POST['nomProduit'];
    $idCategorie = $_POST['idCategorie'];
    if ($nomProduit != "") {
        $req1 = $pdo->prepare("
        INSERT INTO Produits(nomProduit,idCategorie)
        VALUES (:nomProduit,:idCategorie)
        ");
        $req1->execute(array(
            ':nomProduit' => $nomProduit,
            'idCategorie' => $idCategorie
        ));
    }
}
header('location:index.php');
