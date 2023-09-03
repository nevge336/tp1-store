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
        <a href='client-create.php'>Nouveau client</a>
    </div>
    <table>
        <tr>
            <th>Nom</th>
            <th>Contact</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Courriel</th>
        </tr>
        <?php
            foreach($select as $row){ ?>
                <tr>
                    <td><a href="client-show.php?id=<?= $row['id'] ?>"><?= $row['name']; ?></a></td>
                    <td><?= $row['contact']; ?></td>
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
