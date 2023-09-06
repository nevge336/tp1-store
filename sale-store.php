<?php
require_once('class/Crud.php');
//print_r($_POST);
//die();
$crud = new Crud;

// Créer un tableau avec les données à insérer dans mlab_sale
$dataToInsertSale = array(
    'date' => $_POST['date'], 
    'sale_client_id' => $_POST['client_id']
);
//print_r($dataToInsert);
//die();
// Étape 1 : Insérer dans la première table (mlab_sale)
$insert_sale = $crud->insert('mlab_sale', $dataToInsertSale);

if ($insert_sale) {
    
    // L'insertion a réussi on ajoute à la table mlab_product_sale
    $lastInsertedId = $crud->lastInsertId(); 
    $dataToInsertPS = array(
       'ps_sale_id' => $lastInsertedId,
       'ps_product_id' => $_POST['product_id'],
       'ps_quantity' => $_POST['ps_quantity'],
       'ps_price' => $_POST['product_price']
    );
$insert_ps = $crud->insert('mlab_product_sale', $dataToInsertPS);
//header("location:sale-show?id=$insert_sale");
header("location:sale-show.php?id=$insert_sale");


} else {
    // Gestion de l'erreur d'insertion
    echo "Erreur lors de l'insertion dans la table 'mlab_sale'.";
}


?>
