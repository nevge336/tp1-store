<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:client-create.php');
}

$id = $_GET['id'];
require_once('class/Crud.php');
$crud = new Crud;

$selectId = $crud->selectId('mlab_client', $id);
//var_dump($selectId);
//évite de faire un foreach
extract($selectId);



?>
<?php
    require_once('class/Design.php');
    $title = "Création d'une fiche client";
    echo Design::header($title);
?>

    <p><strong>Nom: </strong><?= $name;?></p>
    <p><strong>Adresse: </strong><?= $address;?></p>
    <p><strong>Courriel: </strong><?= $email;?></p>
    <p><strong>Téléphone: </strong><?= $phone;?></p>
    <a href="client-edit.php?id=<?= $id; ?>">Mise à jour</a>

<?php
    echo Design::footer();
?>
