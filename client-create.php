<?php
    require_once('class/Design.php');
    $title = "Création d'une fiche client";
    echo Design::header($title);
?>
    <div>
        <a href="client-index.php">Liste clients</a>
    </div>
    
</div>
    <form action="client-store.php" method="post">
        <label>Nom*
            <input type="text" name="name">
        </label>
        <label>Contact
            <input type="text" name="contact">
        </label>
        <label>Adresse
            <input type="text" name="address">
        </label>
        <label>Code Postal
            <input type="text" name="postal_code">
        </label>
        <label>Courriel*
            <input type="email" name="email">
        </label>
        <label>Téléphone
            <input type="text" name="phone" placeholder="555 555-5555">
        </label>

        <input type="submit" value="Sauvegarder">
    </form>

<?php
    echo Design::footer();
?>