<?php

require_once ('class/Crud.php');

$crud = new Crud;
$select = $crud->select('mlab_client', 'client_id' );

//var_dump($select);


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
                    <td><a href="client-show.php?id=<?= $row['client_id'] ?>"><?= $row['client_name']; ?></a></td>
                    <td><?= $row['client_contact']; ?></td>
                    <td><?= $row['client_address']; ?></td>
                    <td><?= $row['client_phone']; ?></td>
                    <td><?= $row['client_email']; ?></td>
                </tr>
            <?php 
            }
            ?>
    </table>

<?php
    echo Design::footer();
?>
