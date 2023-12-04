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
    <title><?= $label ?> Vehicle</title>
</head>

<body>
    <h2><?= $label ?> Vehicle</h2>

    <form action="action.php?do=savevehicle" method="post">
        <label for="nameVehicle">Vehicle :</label>
        <input type="text" name="nameVehicle" value="<?= $currVehic['name_model'] ?>" required>
        <label for="nameVehicle">Price :</label>
        <input type="text" name="price" value="<?= $currVehic['price'] ?>" required>
        <label for="nameVehicle">Description :</label>
        <input type="text" name="description" value="<?= $currVehic['description_vehicle'] ?>" required>

        <label for="nameVehicle">Brand :</label>
        <select name="brand">
            <?php foreach ($tBrands as $brand) :
                $isSelected = "";
                // si trouve la marque du vehicule on la selectionne via 'selected'
                if ($brand["id"] == $currVehic['id_brand']) :
                    $isSelected = "selected";
                endif;
            ?>
                <option value="<?= $brand["id"] ?>" <?= $isSelected ?>><?= $brand["name_brand"] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="nameVehicle">Places :</label>
        <select name="places">
            <?php foreach ($tPlaces as $places) :
                $isSelected = "";
                if ($places["id"] == $currVehic['id_nb_place']) :
                    $isSelected = "selected";
                endif;
            ?>
                <option value="<?= $places["id"] ?>" <?= $isSelected ?>><?= $places["nb_places"] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="nameVehicle">Color :</label>
        <select name="color">
            <?php foreach ($tColors as $color) :
                $isSelected = "";
                if ($color["id"] == $currVehic['id_color']) :
                    $isSelected = "selected";
                endif;
            ?>
                <option value="<?= $color["id"] ?>" <?= $isSelected ?>><?= $color["name_color"] ?></option>
            <?php endforeach; ?>
        </select>


        <input type="hidden" name="idVehicle" value="<?= $currentId ?>">

        <br>

        <button type="submit"><?= $label ?></button>
    </form>

</body>

</html>