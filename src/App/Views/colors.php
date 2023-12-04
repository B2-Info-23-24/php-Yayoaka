<?php
//namespace App\Views;
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr_FR" xml:lang="fr_FR">

<head>
    <title>Script MVC</title>
</head>

<body>
    <h1>Color List</h1>
    <a href="action.php?do=showcolor&id=0"> <button>Add color in database</button><br /> </a>
    <hr>
    <?php
    foreach ($datas as $color) {
    ?>
        Name : <b><a href="action.php?do=showcolor&id=<?php echo $color["id"]; ?>"><?php echo $color["name_color"]; ?></a></b> -
        (ID : <em><?php echo $color["id"]; ?></em>)
        <input type="button" value="delete" onclick="delColor(<?php echo $color["id"]; ?>)" />
        <br />
        <hr>
    <?php
    }
    ?>

    <p>&nbsp;</p>
    <hr>
    <a href="/indexadmin.php">Retour accueil Admin</a>
</body>

<Script>
    function delColor(id) {
        location.href = "action.php?do=delcolor&id=" + id;
    }
</Script>

</html>