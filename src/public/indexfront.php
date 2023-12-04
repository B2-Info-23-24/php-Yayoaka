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
  </style>
</head>


<body>

  <h1> Page d'accueil</h1>
  <?php
  if (isset($_SESSION['user_logged'])) :
  ?>
    <a href="action.php?do=showfrontuser">User</a> -
    <a href="action.php?do=logout">Logout</a>

    <?php
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) :
    ?>
      - <a href="indexadmin.php">gestion Admin</a> <br /> <!-- acces admin uniquement si user > admin=1 -->
    <?php endif; ?>
    <br /> <br />

  <?php else : ?>
    <a href="loginuser.php">Login</a> <br /> <br />
  <?php endif; ?>


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
    ?>
    <label for="filterp">Place :</label>
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
    $filterPlace = 0;
    if (isset($_GET["filterp"])) :
      $filterPlace = $_GET["filterp"];
    endif;
    ?>
    <label for="filterp">Color :</label>
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

    <?php // creation filtre Price 
    $filterPlace = 0;
    if (isset($_GET["filterp"])) :
      $filterPlace = $_GET["filterp"];
    endif;
    ?>
    <label for="filterp">Price :</label>
    <select name="filterp">
      <option value="0">- Choose a price -</option>
      <option value="10000">entre 0 et 10 000</option>
      <option value="20000">entre 10 000 et 20 000</option>
      <option value="100000">entre 0 et 10000</option>
      <option value="100000">entre 0 et 10000</option>
      <option value="100000">entre 0 et 10000</option>
      <option value="max">supérieru à 50 000</option>
    </select>

    <button type="submit">Filter</button>
  </form>

  <table>
    <thead>
      <th width="20%">Marque</th>
      <th width="20%">Model</th>
      <th width="10%">Nb places</th>
      <th width="20%">Color</th>
      <th width="20%">Price</th>
    </thead>
    <tbody>
      <?php // chargment liste des vehicules
      foreach ($datas as $vehicle) : ?>
        <tr>
          <td>
            - <a href="action.php?do=showproduct&id=<?= $vehicle["id"] ?>"> <?= $vehicle["name_brand"] ?></a>
          </td>
          <td>
            <?= $vehicle["name_model"] ?>
          </td>
          <td>
            <?= $vehicle["nb_places"] ?>
          </td>
          <td>
            <?= $vehicle["name_color"] ?>
          </td>
          <td>
            <?= $vehicle["price"] ?> €
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>



  <hr />

  <?php
  ?>



  <hr />

</body>

</html>