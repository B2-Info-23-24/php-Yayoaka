<?php
//namespace App\Views;
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr_FR" xml:lang="fr_FR">

<head>
    <title>Script MVC</title>
</head>

<body>
    <h1>Vehicles List</h1>
    <a href="action.php?do=showvehicle&id=0"> <button>Add vehicle in database</button><br /> </a>
    <hr>
    <?php
    foreach ($datas as $vehicle) {
    ?>
        Name : <b><a href="action.php?do=showvehicle&id=<?php echo $vehicle["id"]; ?>"><?php echo $vehicle["name_model"]; ?></a></b> -
        (ID : <em><?php echo $vehicle["id"]; ?> </em>) -
        Price : <?php echo $vehicle["price"] ?>€ -
        Description : <?php echo $vehicle["description_vehicle"] ?> -
        Brand : <?php echo $vehicle["id_brand"] ?> -
        Places : <?php echo $vehicle["id_nb_place"] ?> -
        Color : <?php echo $vehicle["id_color"] ?>

        <a href="action.php?do=delvehicle&id=<?php echo $vehicle["id"]; ?>">Delete</a>
        <br />
        <hr>
    <?php
    }
    ?>

    <?php include "footerBO.php"; ?>

    <p>&nbsp;</p>
    <hr>
    <a href="/indexadmin.php">Retour accueil Admin</a>

</body>


</html>