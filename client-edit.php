<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:client-index.php');
    exit;
}

$id = $_GET['id'];

require_once('class/Crud.php');

$crud = new Crud;
$selectId = $crud->selectId('mlab_client', $id);
extract($selectId);
?>

<?php
    require_once('class/Design.php');
    $title = "Mise à jour du client";
    echo Design::header($title);
?>


    <form action="client-update.php" method="post">
        <input type="hidden" name="id" value ="<?= $id; ?>">
        <label>Nom
            <input type="text" name="name" value="<?= $name; ?>">
        </label>
        <label>Adresse
            <input type="text" name="address" value="<?= $address; ?>">
        </label>
        <label>Code Postal
            <input type="text" name="postal_code" value="<?= $postal_code; ?>">
        </label>
        <label>Courriel
            <input type="text" name="email" value="<?= $email; ?>">
        </label>
        <label>Téléphone
            <input type="text" name="phone" value="<?= $phone; ?>">
        </label>
        <label>Date de naissance
            <input type="date" name="birthday" value="<?= $birthday; ?>">
        </label>
        <input type="submit" value ="Save">
    </form>
    <form action="client-delete.php" method="post">
        <input type="hidden" name="id" value ="<?= $id; ?>">
        <button>Effacer</button>
    </form>

<?php
    echo Design::footer();
?>