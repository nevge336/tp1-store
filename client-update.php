<?php


require_once('class/Crud.php');
$crud = new Crud;
$update = $crud->update('mlab_client', $_POST);




