<?php

require_once ('class/Crud.php');

$crud = new Crud;
$select = $crud->select('mlab_product');

//var_dump($select);


?>
<?php
    require_once('class/Design.php');
    $title = "Liste des produits";
    echo Design::header($title);

?>
        <a href='product-create.php'>Nouveau produit</a>
    </div>
    <table>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
        </tr>
        <?php
            foreach($select as $row){ ?>
                <tr>
                    <td><a href="product-show.php?id=<?= $row['id'] ?>"><?= $row['name']; ?></a></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['price']; ?></td>
                </tr>
            <?php 
            }
            ?>
    </table>

<?php
    echo Design::footer();
?>
