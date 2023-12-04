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
    <title><?= $label ?> Place</title>
</head>

<body>
    <h2><?= $label ?> Place</h2>

    <form action="action.php?do=saveplace" method="post">
        <label for="nbPlace">Place :</label>
        <input type="text" name="nbPlace" value="<?= $name ?>" required>

        <input type="hidden" name="idPlace" value="<?= $currentId ?>">

        <br>

        <button type="submit"><?= $label ?></button>
    </form>

</body>

</html>