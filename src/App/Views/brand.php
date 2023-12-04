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
    <title><?= $label ?> Brand</title>
</head>

<body>
    <h2><?= $label ?> Brand</h2>

    <form action="action.php?do=savebrand" method="post">
        <label for="nameBrand">Brand :</label>
        <input type="text" name="nameBrand" value="<?= $name ?>" required>

        <input type="hidden" name="idBrand" value="<?= $currentId ?>">

        <br>

        <button type="submit"><?= $label ?></button>
    </form>

</body>

</html>