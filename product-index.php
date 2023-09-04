<?php

require_once ('class/Crud.php');

$crud = new Crud;
$select = $crud->select('mlab_product', 'product_id');

//var_dump($select);


?>
<?php
    require_once('class/Design.php');
    $title = "Liste des produits";
    echo Design::header($title);

?>
<div>
<a href='product-create.php'>Nouveau produit</a>
</div>

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
                    <td><a href="product-show.php?id=<?= $row['product_id'] ?>"><?= $row['product_name']; ?></a></td>
                    <td><?= $row['product_description']; ?></td>
                    <td><?= $row['product_price']; ?></td>
                </tr>
            <?php 
            }
            ?>
    </table>

<?php
    echo Design::footer();
?>
