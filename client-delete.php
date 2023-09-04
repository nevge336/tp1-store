<?php

$id = $_POST['client_id'];

require_once('class/Crud.php');

$crud = new Crud;
$crud->delete('mlab_client', $id, 'client-index', 'client_id');


?>