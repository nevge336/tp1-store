<?php

if (!isset($_GET['id']) || $_GET['id']==null){
    header('location:sale-create.php');
}

$id = $_GET['id'];
require_once('class/Crud.php');
$crud = new Crud;

$select_sale_id = $crud->selectId('mlab_product_sale', $id, 'sale_id');
//var_dump($selectId);
//évite de faire un foreach
extract($selectId);



?>
<?php
    require_once('class/Design.php');
    $title = "Facture $select_sale_id";
    echo Design::header($title);
?>
               

        
    </div>
    <table>
        <tr>
            <th>no facture: </th>
            <td><?= $sale_id;?></td>
        </tr>
        <tr>
            <th>id produit: </th>
            <td><?= $product_id;?></td>
        </tr>
        
    </table>
    <form action="product-delete.php" method="post">
                <input type="hidden" name="id" value ="<?= $id; ?>">
                <button>Effacer</button>
            </form>
        
        
    

<?php
    echo Design::footer();
?>
