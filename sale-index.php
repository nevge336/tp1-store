<?php

require_once ('class/Crud.php');

$crud = new Crud;
//$select = $crud->select('mlab_sale', 'sale_id' );
$select = $crud->selectSql('mlab_sale', 'sale_id', 'INNER JOIN mlab_client ON client_id = sale_client_id');


//var_dump($select);


    require_once('class/Design.php');
    $title = "Liste des ventes";
    echo Design::header($title);

?>
<div>
<a href='sale-create.php'>Nouvelle vente</a>
</div>
        
    </div>
    <table>
        <tr>
            <th>No Facture</th>
            <th>Date</th>
            <th>Client</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            foreach($select as $row){ ?>
                <tr>
                    <td><a href="sale-show.php?id=<?= $row['sale_id'] ?>"><?= $row['sale_id']; ?></a></td>
                    <td><?= $row['date']; ?></td>
                    <td><a href="client-show.php?id=<?= $row['client_id'] ?>"><?= $row['client_name']; ?></td>
                </tr>
            <?php 
            }
            ?>
    </table>

<?php
    echo Design::footer();
?>