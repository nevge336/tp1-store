<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:client-index.php');
    exit;
}

$id = $_GET['id'];

require_once('class/Crud.php');

$crud = new Crud;
$selectId = $crud->selectId('mlab_client', $id, 'client_id');
extract($selectId);
?>

<?php
    require_once('class/Design.php');
    $title = "Modifier client";
    echo Design::header($title);
?>
        <div>
            <a href='client-create.php'>Nouveau client</a>
        </div>
        
    </div>
 
    <form action="client-update.php" method="post">
        
        <input type="hidden" name="client_id" value ="<?= $client_id; ?>">
        <label>Nom
            <input type="text" name="client_name" value="<?= $client_name; ?>">
        </label>
        <label>Contact
            <input type="text" name="client_contact" value="<?= $client_contact; ?>">
        </label>
        <label>Adresse
            <input type="text" name="client_address" value="<?= $client_address; ?>">
        </label>
        <label>Code Postal
            <input type="text" name="client_postal_code" value="<?= $client_postal_code; ?>">
        </label>
        <label>Courriel
            <input type="text" name="client_email" value="<?= $client_email; ?>">
        </label>
        <label>Téléphone
            <input type="text" name="client_phone" value="<?= $client_phone; ?>">
        </label>
        <input type="submit" value ="Sauvegarder">
        
    </form>


<?php
    echo Design::footer();
?>