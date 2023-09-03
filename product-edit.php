<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:product-index.php');
    exit;
}

$id = $_GET['id'];

require_once('class/Crud.php');

$crud = new Crud;
$selectId = $crud->selectId('mlab_product', $id);
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
    <input type="hidden" name="id" value ="<?= $id; ?>">
    <label>Nom produit
            <input type="text" name="name" value="<?= $name; ?>">
        </label>
        <label>Description
            <textarea name="description" rows="5" cols="50" value="<?= $description; ?>" ></textarea>
        </label>
        <label>Coût
            <input type="text" name="cost" value="<?= $cost; ?>">
        </label>
        <label>Prix de vente
            <input type="text" name="price" value="<?= $price; ?>">
        </label>    
        <input type="submit" value="Sauvegarder">
    </form>


<?php
    echo Design::footer();
?>