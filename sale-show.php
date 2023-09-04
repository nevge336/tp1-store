<?php

if (!isset($_GET['id']) || $_GET['id'] == null) {
    header('location:sale-create.php');
}

$id = $_GET['id'];

require_once('class/Crud.php');
$crud = new Crud;

$select_sale_data = $crud->selectId('mlab_sale', $id, 'sale_id', 'sale-index');
extract($select_sale_data);

// Sélectionner le nom du client via la table mlab_client
$client_id = $select_sale_data['sale_client_id'];
$client_data = $crud->selectId('mlab_client', $client_id, 'client_id', 'sale-index');
extract($client_data);

/*
// Sélectionner la qte et le prix de la table mlab_product_sale
$product_sale_data = $crud->selectProductSale($sale_id, $product_id);
extract($product_sale_data);
//$product_sale_data = $crud->selectId('mlab_product_sale', $sale_id, 'ps_sale_id', 'sale-index');
//extract($product_sale_data);

// Sélectionner le nom du produit via la
$product_id = $product_sale_data['ps_product_id'];

$product_data = $crud->selectId('mlab_product', $product_id, 'product_id', 'sale-index');
extract($product_data);*/
?>
<?php
require_once('class/Design.php');
$title = "Facture";
echo Design::header($title);
?>

<div>
    <a href="sale-edit.php?id=<?= $id; ?>">Modifier</a>
    <a href="sale-create.php?id=<?= $id; ?>">Nouvelle vente</a>
    <a href="sale-index.php">Liste facture</a>
</div>

</div>
<table>
    <tr>
        <th>no facture : </th>
        <td><?= $sale_id; ?></td>
    </tr>
    <tr>
        <th>date : </th>
        <td><?= $date; ?></td>
    </tr>
    <tr>
        <th>Client : </th>
        <td><?= $client_name; ?></td>
    </tr>
    <tr>
        <th>Produit : </th>
        <td><?= $product_name; ?></td>
    </tr>
    <tr>
        <th>Quantite: </th>
        <td><?= $ps_quantity; ?></td>
    </tr>
    <tr>
        <th>Prix unitaire: </th>
        <td><?= $product_price; ?> $</td>
    </tr>
    <tr>
        <th>Prix total: </th>
        <td><?= $product_price * $ps_quantity; ?> $</td>
    </tr>
</table>
<form action="sale-delete.php" method="post">
    <input type="hidden" name="sale_id" value="<?= $select_sale_data['sale_id']; ?>">
    <button>Effacer</button>
</form>

<?php
echo Design::footer();
?>
