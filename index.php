<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=listecourses;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);


$req1 = $pdo->prepare("SELECT * FROM categories");
$req1->execute();
$categories = $req1->fetchAll();

$req2 = $pdo->prepare("SELECT * FROM produits INNER JOIN categories ON produits.idCategorie = categories.idCategorie");
$req2->execute();
$produits = $req2->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma liste de courses</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste de courses</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <h1>Ma super liste de course!</h1>
        <section class="prodForm">
            <h3>Ajouter un produit</h3>
            <form action="createProduit.php" method="post">
                <input type="text" name="nomProduit" value="">
                <input class="btn btn-outline-success" type="submit" value="Ajouter un produit">
                <select name="idCategorie">
                    <option disabled> --Choisissez une catégorie--</option>
                    <?php
                    foreach ($categories as $value) { ?>
                        <option value="<?= $value['idCategorie'] ?>"><?= $value['nomCategorie'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </form>
        </section>

        <section class="listProd">
            <table class="table">
                <thead>
                    <th>Produit à acheter</th>
                    <th>Rayon</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($produits as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $value['nomProduit'] ?></td>
                            <td><?php echo $value['nomCategorie'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>

</body>

</html>