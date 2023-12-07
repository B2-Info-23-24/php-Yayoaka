<?php
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ca roule ma poule</title>

  <style>
    td {
      text-align: center;
    }

    td.col1 {
      text-align: left;
      padding-left: 20px;
    }

    .coltitle {
      font-size: 14pt;
      font-weight: bold;
    }
  </style>
</head>


<body>

  <?php include "header.php" ?>

  <h1>Search your car</h1>

  <form action="action.php" method="get">
    <input type="hidden" name="do" value="filtervehicles" />

    <?php // creation filtre Brands 
    $filterBrand = 0;
    if (isset($_GET["filterb"])) :
      $filterBrand = $_GET["filterb"];
    endif;
    ?>
    <label for="filterb">Brand :</label>
    <select name="filterb">
      <option value="0">- Choose a brand -</option>
      <?php foreach ($tBrands as $brand) :
        $isSelected = "";
        // si trouve la marque du vehicule on la selectionne via 'selected'
        if ($brand["id"] == $filterBrand) :
          $isSelected = "selected";
        endif;
      ?>
        <option value="<?= $brand["id"] ?>" <?= $isSelected ?>><?= $brand["name_brand"] ?></option>
      <?php endforeach; ?>
    </select>

    <?php // creation filtre Places 
    $filterPlace = 0;
    if (isset($_GET["filterp"])) :
      $filterPlace = $_GET["filterp"];
    endif;
    // echo "filter : " . $filterPlace;
    // var_dump($_GET);
    ?>

    &nbsp; <label for="filterp">Place :</label>
    <select name="filterp">
      <option value="0">- Choose a place -</option>
      <?php foreach ($tPlaces as $place) :
        $isSelected = "";
        if ($place["id"] == $filterPlace) :
          $isSelected = "selected";
        endif;
      ?>
        <option value="<?= $place["id"] ?>" <?= $isSelected ?>><?= $place["nb_places"] ?></option>
      <?php endforeach; ?>
    </select>

    <?php // creation filtre color 
    $filterColor = 0;
    if (isset($_GET["filterc"])) :
      $filterColor = $_GET["filterc"];
    endif;
    ?>
    &nbsp; <label for="filterc">Color :</label>
    <select name="filterc">
      <option value="0">- Choose a color -</option>
      <?php foreach ($tColors as $color) :
        $isSelected = "";
        if ($color["id"] == $filterColor) :
          $isSelected = "selected";
        endif;
      ?>
        <option value="<?= $color["id"] ?>" <?= $isSelected ?>><?= $color["name_color"] ?></option>
      <?php endforeach; ?>
    </select>

    <?php // creation filtre Price 
    $filterPrice = 0;
    $tSelected = array(
      "0::40" => "", "40::60" => "", "60::80" => "",
      "80::100" => "", "100::120" => "", "120::999" => ""
    );
    if (isset($_GET["filterpr"])) :
      $filterPrice = $_GET["filterpr"];
      if (isset($tSelected[$filterPrice])) :
        $tSelected[$filterPrice] = "selected";
      endif;
    endif;
    ?>
    &nbsp; <label for="filterp">Price :</label>
    <select name="filterpr">
      <option value="0">- Choose a price -</option>
      <option value="0::40" <?= $tSelected["0::40"] ?>>from 0 to 40</option>
      <option value="40::60" <?= $tSelected["40::60"] ?>>from 40 to 60</option>
      <option value="60::80" <?= $tSelected["60::80"] ?>>from 60 to 80</option>
      <option value="80::100" <?= $tSelected["80::100"] ?>>from 80 to 100</option>
      <option value="100::120" <?= $tSelected["100::120"] ?>>from 100 to 120</option>
      <option value="120::999" <?= $tSelected["120::999"] ?>>more than 120</option>
    </select>

    &nbsp; <button type="submit">Filter</button>
  </form>
  <br />

  <table>
    <thead>
      <th width="18%">Marque</th>
      <th width="18%">Model</th>
      <th width="10%">Nb places</th>
      <th width="18%">Color</th>
      <th width="20%">Price</th>
      <th width="20%">[Action]</th>
    </thead>
    <tbody>
      <?php // chargment liste des vehicules
      foreach ($datas as $vehicle) : ?>
        <tr>
          <td class="col1 coltitle">
            - <a href="action.php?do=searchdate&id=<?= $vehicle["id"] ?>"><?= $vehicle["name_brand"] ?></a>
          </td>
          <td class="coltitle">
            <a href="action.php?do=searchdate&id=<?= $vehicle["id"] ?>"><?= $vehicle["name_model"] ?></a>
          </td>
          <td>
            <?= $vehicle["nb_places"] ?>
          </td>
          <td>
            <?= $vehicle["name_color"] ?>
          </td>
          <td>
            <?= $vehicle["price"] ?> €/day
          </td>
          <td>
            <?php if (isset($_SESSION['user_logged'])) : ?>
              <a href="action.php?do=addfav&id=<?= $vehicle["id"] ?>">Add to favorites</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


  <br />
  <hr />

  <?php
  ?>


</body>

</html>