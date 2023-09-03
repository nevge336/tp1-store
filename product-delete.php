<?php

$id = $_POST['id'];

require_once('class/Crud.php');

$crud = new Crud;
$crud->delete('mlab_product', $id, 'product-index');


?>