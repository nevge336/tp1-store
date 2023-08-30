<?php

/*
print_r($_POST);
$id = 'id';
$table = 'client';
$fieldName = null;
foreach($_POST as $key=>$value){
    $fieldName .="$key = :$key, ";   
}
$fieldName = rtrim($fieldName, ', ');

echo "UPDATE $table SET $fieldName WHERE $id = :$id";*/

require_once('class/Crud.php');
$crud = new Crud;
$update = $crud->update('mlab_client', $_POST);

?>