<?php


//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `listecourses` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=listecourses;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table categories
    $req1 = "CREATE TABLE IF NOT EXISTS `listecourses`.`categories`(
    `idCategorie` INT NOT NULL AUTO_INCREMENT,
    `nomCategorie` VARCHAR(50),
    PRIMARY KEY(idCategorie));";
    $pdo->exec($req1);

    //Création de la table produits
    $req2 = "CREATE TABLE IF NOT EXISTS `listecourses`.`produits` (
    `idProduit` INT NOT NULL AUTO_INCREMENT ,
    `nomProduit` VARCHAR(50) NOT NULL ,
    `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `idCategorie` INT(5),
    PRIMARY KEY (`idProduit`) , FOREIGN KEY(idCategorie) REFERENCES `categories` (`idCategories`));";
    $pdo->exec($req2);
    echo 'Félicitations, les tables ont bien été créées !';
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
