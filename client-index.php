<?php

require_once ('class/Crud.php');

$crud = new Crud;
$select = $crud->select('mlab_client');

//var_dump($select);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Phone</th>
            <th>Courriel</th>
        </tr>
        <?php
            foreach($select as $row){ ?>
                <tr>
                    <td><a href="client-show.php?id=<?= $row['id'] ?>"><?= $row['nom']; ?></a></td>
                    <td><?= $row['address']; ?></td>
                    <td><?= $row['phone']; ?></td>
                    <td><?= $row['courriel']; ?></td>
                </tr>
            <?php 
            }
            ?>
    </table>
</body>
</html>
