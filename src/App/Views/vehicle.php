<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ca roule ma poule</title>
</head>


<body>

    <h1><?= $currVehic["name_brand"] ?> - <?= $currVehic["name_model"] ?> </h1>

    Price: <?= $currVehic["price"] ?> €/Day<br />

    <h2> Caractéristiques : </h2>
    Color: <?= $currVehic["name_color"] ?><br />
    Places: <?= $currVehic["nb_places"] ?><br />

    <h2> Description : </h2>
    <?= $currVehic["description_vehicle"] ?><br />

    <hr>
    <h2> Réservation : </h2>
    <form action="action.php?do=searchdate" method="get">
        <label for="month">Month :</label>
        <?php

        $currDate = date("Y-n");
        ?>
        <select name="month">
            <?php
            $startDate = $currDate;
            for ($i = 0; $i < 6; $i++) :
                $newDate = date("Y-n",  strtotime($startDate));
                $labelDate = date("F Y",  strtotime($startDate));
            ?>
                <option value="<?= $newDate ?>"><?= $labelDate ?></option>
            <?php
                // passer au mois suivant
                $startDate = date('Y-n', strtotime("+1 months", strtotime($newDate)));
            endfor; ?>
        </select>
        <input type="submit" value="Search Free Date">

        <input type="hidden" name="idVehicle" value="<?= $currVehic["id"] ?>">
    </form>

    <!-- =================DATES DISPO======================================= -->
    <form action="action.php?do=reservation" method="post">
        <table>
            <tbody>
                <tr>
                    <?php
                    $tNotFree = array(5, 12, 13, 14, 15, 24);

                    $currMonth = date("n", strtotime($currDate));
                    $curYear = date("Y", strtotime($currDate));
                    $nbMaxDays = cal_days_in_month(CAL_GREGORIAN, $currMonth, $curYear);
                    for ($i = 1; $i <= $nbMaxDays; $i++) :
                        $bgColor = "green";
                        $chkBx = "<input type='checkbox' name='resa_days[]' value='" . $i . "'>";
                        if (in_array($i, $tNotFree)) :
                            $bgColor = "red";
                            $chkBx = "";
                        endif;
                    ?>

                        <td width='7%' style='background-color:<?= $bgColor ?>'>
                            <?= $chkBx ?>
                            <?= $i ?> <?= date("M", strtotime($currDate)) ?>
                        </td>

                    <?php
                        // changement de ligne par modulo de 10
                        if (($i % 10) == 0) :
                            echo "</tr>";
                            echo "<tr>";
                        endif;
                    endfor;
                    ?>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Reservation">
        <input type="hidden" name="idVehicle" value="<?= $currVehic["id"] ?>">
        <input type="hidden" name="month" value="2023-12">
    </form>




</body>

</html>