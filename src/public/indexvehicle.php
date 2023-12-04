<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ca roule ma poule</title>
</head>


<body>

    <h1> Page d'accueil</h1>

    <?php foreach ($datas as $vehicle) : ?>

        <a href="action.php?do=showproduct"><?= $vehicle["id"] ?> - <?= $vehicle["name_model"] ?> - <?= $vehicle["price"] ?>€</a><br />

    <?php endforeach; ?>




</body>

</html>