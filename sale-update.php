<?php


require_once('class/Crud.php');
$crud = new Crud;
$update = $crud->update('mlab_sale', $_POST, 'sale-index', 'sale_id');




