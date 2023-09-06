<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:sale-index.php');
    exit;
}

$id = $_GET['id'];

require_once('class/Crud.php');

$crud = new Crud;
$selectId = $crud->selectId('mlab_sale', $id, 'sale_id');
$select_client = $crud->select('mlab_client', 'client_id');
$select_product = $crud->select('mlab_product', 'product_id');
extract($selectId);
?>

<?php
    require_once('class/Design.php');
    $title = "Modifier facture";
    echo Design::header($title);
?>
        <div>
            <a href='sale-create.php'>Nouvelle facture</a>
           
        </div>
        
    </div>
 
    <form action="sale-update.php" method="post">

    <label>No Facture
            <input type="text" name="sale_id" value="<?= $sale_id; ?>" readonly>
        </label>
        
        <label>Date
            <input type="text" name="date" value="<?= $date; ?>">
        </label>
        <label>Nom client
            <select name="client_id">
            <?php
            foreach($select_client as $row){ ?>  
             <option value="<?=$row['client_id']; ?>"><?=$row['client_name']; ?></option>
            
            <?php 
            }
            ?>
            </select>
        </label>
        <label>Produit
            <select name="product_id" id="product-select">
            <?php
            foreach($select_product as $row){ 

           
            ?>  
             <option value="<?=$row['product_id'];?>" data-price="<?= $row['product_price']; ?>"><?= $row['product_name'] . ' - '. $row['product_price'] .' $'; ?></option>
            
            <?php  
            }
            ?>
            </select>
        </label>
        
        <label>Quantité
            <input type="number" name="ps_quantity" value="1">
        </label>
        <input type="hidden" name="product_price" id="product-price" value="<?= $select_product[0]['product_price']; ?>">
        <input type="hidden" name="date" value="<?= date('Y-m-d H:i:s'); ?>">
       
        <input type="submit" value="Sauvegarder">
    </form>


<?php
    echo Design::footer();
?>