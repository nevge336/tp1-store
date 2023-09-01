<?php
    require_once('class/Design.php');
    $title = "Création d'une fiche client";
    echo Design::header($title);
?>

</div>
    <form action="client-store.php" method="post">
        <label>Nom
            <input type="text" name="name">
        </label>
        <label>Adresse
            <input type="text" name="address">
        </label>
        <label>Code Postal
            <input type="text" name="postal_code">
        </label>
        <label>Courriel
            <input type="email" name="email">
        </label>
        <label>Téléphone
            <input type="text" name="phone">
        </label>
        <label>Date de naissance
            <input type="date" name="birthday">
        </label>
        <input type="submit" value="Save">
    </form>

<?php
    echo Design::footer();
?>