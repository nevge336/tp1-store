<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:product-index.php');
    exit;
}

$id = $_GET['id'];

require_once('class/Crud.php');

$crud = new Crud;
$selectId = $crud->selectId('mlab_product', $id, 'product_id');
extract($selectId);
?>

<?php
    require_once('class/Design.php');
    $title = "Modifier client";
    echo Design::header($title);
?>
        <div>
            <a href='product-create.php'>Nouveau produit</a>
           
        </div>
        
    </div>
 
    <form action="product-update.php" method="post">
    <input type="hidden" name="product_id" value ="<?= $product_id; ?>">
    <label>Nom produit
            <input type="text" name="product_name" value="<?= $product_name; ?>">
        </label>
        <label>Description
            <textarea name="product_description" rows="5" cols="50" value="<?= $product_description; ?>" ></textarea>
        </label>
        <label>Coût
            <input type="text" name="product_cost" value="<?= $product_cost; ?>">
        </label>
        <label>Prix de vente
            <input type="text" name="product_price" value="<?= $product_price; ?>">
        </label>    
        <input type="submit" value="Sauvegarder">
    </form>


<?php
    echo Design::footer();
?>