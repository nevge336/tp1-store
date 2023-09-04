<?php

require_once ('class/Crud.php');

$crud = new Crud;
$select = $crud->select('mlab_sale', 'sale_id' );


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
            <th>No Id</th>
            <th>Date</th>
            <th>Id Client</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            foreach($select as $row){ ?>
                <tr>
                    <td><a href="sale-show.php?id=<?= $row['sale_id'] ?>"><?= $row['sale_id']; ?></a></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['sale_client_id']; ?></td>
                </tr>
            <?php 
            }
            ?>
    </table>

<?php
    echo Design::footer();
?>