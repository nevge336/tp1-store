<?php


require_once('class/Crud.php');
$crud = new Crud;
$update = $crud->update('mlab_product', $_POST, 'product-index', 'product_id');




