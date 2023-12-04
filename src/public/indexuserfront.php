<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ca roule ma poule</title>
</head>


<body>

    <h1> Page User</h1>

    <?php foreach ($datas as $user) : ?>

        <a href="action.php?do=showpuser"><?= $user["id"] ?> - <?= $user["name"] ?> - <?= $user["firstname"] ?></a><br />

    <?php endforeach; ?>

    <hr />
    <p>&nbsp;</p>
    <hr>
    <a href="/">Retour accueil</a>

</body>

</html>