<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MVC PDO</title>
    <style>
        input{
            display: block;
            margin: 5px;
        }
    </style>
</head>
<body>
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
        <input type="submit" value ="Save">

    </form>
</body>
</html>