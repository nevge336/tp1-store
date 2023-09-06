<?php


require_once('class/Crud.php');

$crud = new Crud;

// Récupérer les données 
$client_id = $_POST['client_id'];
$product_id = $_POST['product_id'];
$ps_quantity = $_POST['ps_quantity'];
$product_price = $_POST['product_price'];


$crud->update('mlab_sale', $_POST, 'sale-index', 'sale_id');
// $updateClient = $crud->update('mlab_client', $_POST, 'client-index', 'client_id');
// $updateProduct = $crud->update('mlab_product', $_POST, 'product-index', 'product_id');
// $updatePS = $crud->updateCPK('mlab_product_sale', $_POST, 'sale-index', 'ps_sale_id', 'ps_product_id');



