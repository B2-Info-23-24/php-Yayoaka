<?php
$label = "ADD";
$currentId = 0;
if (isset($id) && $id > 0) :
    $label = "UPDATE";
    $currentId = $id;
endif;
if (!isset($name)) :
    $name = "";
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $label ?> User</title>
</head>

<body>
    <h2><?= $label ?> User</h2>

    <form action="action.php?do=saveuser" method="post">
        <label for="nameUser">User :</label>
        <input type="text" name="nameUser" value="<?= $currUser['name'] ?>" required>
        <label for="nameUser">Firstname :</label>
        <input type="text" name="firstname" value="<?= $currUser['firstname'] ?>" required>
        <label for="nameUser">Admin :</label>
        <input type="text" name="admin" value="<?= $currUser['admin'] ?>" required>
        <label for="nameUser">Phone :</label>
        <input type="text" name="nb_phone" value="<?= $currUser['nb_phone'] ?>" required>
        <label for="nameUser">Mail :</label>
        <input type="text" name="mail" value="<?= $currUser['mail'] ?>" required>
        <label for="nameUser">Password :</label>
        <input type="text" name="password" value="<?= $currUser['password'] ?>" required>

        <input type="hidden" name="idUser" value="<?= $currentId ?>">

        <br>

        <button type="submit"><?= $label ?></button>
    </form>

</body>

</html>