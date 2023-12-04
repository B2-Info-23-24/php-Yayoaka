<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    <form action="action.php?do=login" method="post">
        <label for="nameuser">Name :</label>
        <input type="text" name="nameuser" value="" required>
        <br />
        <label for="password">Password :</label>
        <input type="password" name="password" value="" required>

        <br />

        <button type="submit">Login</button>
    </form>

    <p>&nbsp;</p>
    <hr>
    <a href="/">Retour accueil</a>

</body>

</html>