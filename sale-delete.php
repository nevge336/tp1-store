<?php

$ps_sale_id = $_POST['ps_sale_id'];
$ps_product_id = $_POST['ps_product_id'];

$id = $ps_sale_id . '-' . $ps_product_id;

require_once('class/Crud.php');

$crud = new Crud;
$crud->delete('mlab_product_sale', $id, 'sale-index');


?>