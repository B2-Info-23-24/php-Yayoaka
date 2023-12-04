<?php
//namespace App\Views;
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr_FR" xml:lang="fr_FR">

<head>
    <title>Script MVC</title>
</head>

<body>
    <h1>Brands List</h1>
    <a href="action.php?do=showbrand&id=0"> <button>Add brand in database</button><br /> </a>
    <hr>
    <?php
    foreach ($datas as $brand) {
    ?>
        Name : <b><a href="action.php?do=showbrand&id=<?php echo $brand["id"]; ?>"><?php echo $brand["name_brand"]; ?></a></b> -
        (ID : <em><?php echo $brand["id"]; ?></em>)
        <input type="button" value="delete" onclick="delBrand(<?php echo $brand["id"]; ?>)" />
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
    function delBrand(id) {
        location.href = "action.php?do=delbrand&id=" + id;
    }
</Script>

</html>