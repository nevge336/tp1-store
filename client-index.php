<?php

require_once ('class/Crud.php');

$crud = new Crud;
$select = $crud->select('mlab_client');

//var_dump($select);


?>
<?php
    require_once('class/Design.php');
    $title = "Liste des clients";
    echo Design::header($title);
?>

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
                    <td><a href="client-show.php?id=<?= $row['id'] ?>"><?= $row['name']; ?></a></td>
                    <td><?= $row['address']; ?></td>
                    <td><?= $row['phone']; ?></td>
                    <td><?= $row['email']; ?></td>
                </tr>
            <?php 
            }
            ?>
    </table>

<?php
    echo Design::footer();
?>
