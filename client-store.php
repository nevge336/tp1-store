<?php

//print_r($_POST);

//implode() prend un tableau et la transforme en string
/*
$fieldName = implode(', ', array_keys($_POST));
$fieldValue = implode(', ', array_keys($_POST));

$table = 'client';
$sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue";*/


require_once('class/Crud.php');

$crud = new Crud;
$insert = $crud->insert('mlab_client', $_POST);

//echo $insert;

header("location:client-show.php?id=$insert");




?>