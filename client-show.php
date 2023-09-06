<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:client-create.php');
}

$id = $_GET['id'];

require_once('class/Crud.php');
$crud = new Crud;

$selectId = $crud->selectId('mlab_client', $id, 'client_id');
//var_dump($selectId);
//évite de faire un foreach
extract($selectId);



?>
<?php
    require_once('class/Design.php');
    $title = "Fiche client";
    echo Design::header($title);
?>
        <div>
            <a href="client-edit.php?id=<?=$id; ?>">Modifier</a>
            <a href="client-create.php">Nouveau client</a>
            <a href='sale-create.php'>Vente</a>
        </div>
        

        
    </div>
    <table>
        <tr>
            <th>Nom: </th>
            <td><?= $client_name;?></td>
        </tr>
        <tr>
            <th>Contact: </th>
            <td><?= $client_contact;?></td>
        </tr>
        <tr>
            <th>Adresse: </th>
            <td><?= $client_address;?></td>
        </tr>
        <tr>
            <th>Code Postal: </th>
            <td><?= $client_postal_code;?></td>
        </tr>
        <tr>
            <th>Courriel: </th>
            <td><?= $client_email;?></td>
        </tr>
        <tr>
            <th>Téléphone: </th>
            <td><?= $client_phone;?></td>
        </tr> 
    </table>
    <form action="client-delete.php" method="post">
                <input type="hidden" name="client_id" value ="<?= $client_id; ?>">
                <button>Effacer</button>
    </form>
        
        
    

<?php
    echo Design::footer();
?>
