<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ca roule ma poule</title>
</head>


<body>

    <h1><?= $currUser["name"] ?> - <?= $currVecurrUserhic["firstname"] ?> </h1>

    <h2> Information : </h2>
    Phone: <?= $currUser["nb_phone"] ?><br />
    Mail: <?= $currUser["mail"] ?><br />
    Password : <?= $currUser["password"] ?><br />

    <hr>

</body>

</html>