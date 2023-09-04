<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:product-create.php');
}

$id = $_GET['id'];
require_once('class/Crud.php');
$crud = new Crud;

$selectId = $crud->selectId('mlab_product', $id, 'product_id');
//var_dump($selectId);
//évite de faire un foreach
extract($selectId);



?>
<?php
    require_once('class/Design.php');
    $title = "Fiche produit";
    echo Design::header($title);
?>
        <div>
            <a href="product-edit.php?id=<?= $id; ?>">Modifier</a>
            <a href="product-create.php?id=<?= $id; ?>">Nouveau produit</a>
            <a href="product-index.php">Liste produits</a>
        </div>
        

        
    </div>
    <table>
        <tr>
            <th>Nom: </th>
            <td><?= $product_name;?></td>
        </tr>
        <tr>
            <th>Description: </th>
            <td><?= $product_description;?></td>
        </tr>
        <tr>
            <th>cost: </th>
            <td><?= $product_cost;?> $</td>
        </tr>
        <tr>
            <th>price: </th>
            <td><?= $product_price;?> $</td>
        </tr>
    </table>
    <form action="product-delete.php" method="post">
                <input type="hidden" name="product_id" value ="<?= $product_id; ?>">
                <button>Effacer</button>
            </form>
        
        
    

<?php
    echo Design::footer();
?>
