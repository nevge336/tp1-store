<?php

$id = $_POST['product_id'];

require_once('class/Crud.php');

$crud = new Crud;
$crud->delete('mlab_product', $id, 'product-index');


?>