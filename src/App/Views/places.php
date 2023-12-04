<?php
//namespace App\Views;
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr_FR" xml:lang="fr_FR">

<head>
    <title>Script MVC</title>
</head>

<body>
    <h1>Place List</h1>
    <a href="action.php?do=showplace&id=0"> <button>Add place in database</button><br /> </a>
    <hr>
    <?php
    foreach ($datas as $place) {
    ?>
        Name : <b><a href="action.php?do=showplace&id=<?php echo $place["id"]; ?>"><?php echo $place["nb_places"]; ?></a></b> -
        (ID : <em><?php echo $place["id"]; ?></em>)

        <a href="action.php?do=delplace&id=<?php echo $place["id"]; ?>">Delete</a>
        <br />
        <hr>
    <?php
    }
    ?>

    <p>&nbsp;</p>
    <hr>
    <a href="/indexadmin.php">Retour accueil Admin</a>
</body>
<!-- 
<Script>
    function delPlace(id) {
        location.href = "action.php?do=delplace&id=" + id;
    }
</Script> -->

</html>