<?php
//namespace App\Views;
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr_FR" xml:lang="fr_FR">

<head>
    <title>Script MVC</title>
</head>

<body>
    <h1>User List</h1>
    <a href="action.php?do=showuser&id=0"> <button>Add user in database</button><br /> </a>
    <hr>
    <?php
    foreach ($datas as $user) {
    ?>
        Name : <b><a href="action.php?do=showuser&id=<?php echo $user["id"]; ?>"><?php echo $user["name"]; ?></a></b> -
        (ID : <em><?php echo $user["id"]; ?> </em>) -
        Firstname : <?php echo $user["firstname"] ?> -
        Admin : <?php echo $user["admin"] ?> -
        Number phone : <?php echo $user["nb_phone"] ?> -
        Mail : <?php echo $user["mail"] ?> -
        Password : <?php echo $user["password"] ?>
        <!-- <input type="button" value="delete" onclick="delUser(<?php echo $user["id"]; ?>)" /> -->
        <a href="action.php?do=deluser&id=<?php echo $user["id"]; ?>">Delete</a>
        <br />
        <hr>
    <?php
    }
    ?>

    <p>&nbsp;</p>
    <hr>
    <a href="/indexadmin.php">Retour accueil Admin</a>
</body>

<!-- <Script>
    function delUser(id) {
        location.href = "action.php?do=deluser&id=" + id;
    }
</Script> -->

</html>