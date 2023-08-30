<?php

$id = $_POST['id'];

require_once('class/Crud.php');

$crud = new Crud;
$crud->delete('mlab_client', $id, 'client-index');


?>