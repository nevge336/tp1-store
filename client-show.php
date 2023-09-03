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
    $title = "Fiche client";
    echo Design::header($title);
?>
        <div>
            <a href="client-edit.php?id=<?= $id; ?>">Modifier</a>
            <a href="client-create.php?id=<?= $id; ?>">Nouveau client</a>
            <a href="client-index.php">Liste clients</a>
        </div>
        

        
    </div>
    <table>
        <tr>
            <th>Nom: </th>
            <td><?= $name;?></td>
        </tr>
        <tr>
            <th>Contact: </th>
            <td><?= $contact;?></td>
        </tr>
        <tr>
            <th>Adresse: </th>
            <td><?= $address;?></td>
        </tr>
        <tr>
            <th>Code Postal: </th>
            <td><?= $postal_code;?></td>
        </tr>
        <tr>
            <th>Courriel: </th>
            <td><?= $email;?></td>
        </tr>
        <tr>
            <th>Téléphone: </th>
            <td><?= $phone;?></td>
        </tr> 
    </table>
    <form action="client-delete.php" method="post">
                <input type="hidden" name="id" value ="<?= $id; ?>">
                <button>Effacer</button>
            </form>
        
        
    

<?php
    echo Design::footer();
?>
