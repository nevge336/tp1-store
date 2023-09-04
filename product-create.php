<?php


    require_once('class/Design.php');
    $title = "Création produit";
    echo Design::header($title);
?>

</div>
    <form action="product-store.php" method="post">
        <label>Nom produit*
            <input type="text" name="product_name">
        </label>
        <label>Description
            <textarea name="product_description" rows="5" cols="50"></textarea>
        </label>
        <label>Coût
            <input type="text" name="product_cost" placeholder="0,00$">
        </label>
        <label>Prix de vente
            <input type="text" name="product_price" placeholder="0,00$">
        </label>    
        <input type="submit" value="Sauvegarder">
    </form>

<?php
    echo Design::footer();
?>