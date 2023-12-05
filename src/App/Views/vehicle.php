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
    <form action="action.php" method="get">
        <input type="hidden" name="do" value="searchdate">
        <label for="month">Month :</label>
        <?php
        $currDate = date("Y-m");
        $selectedDate = $currDate;
        if (isset($_GET["month"])) :
            $selectedDate = $_GET["month"];
        endif;
        ?>

        <select name="month">
            <?php
            $startDate = $currDate;
            for ($i = 0; $i < 6; $i++) :
                $isSelected = "";
                $newDate = date("Y-m",  strtotime($startDate));
                $labelDate = date("F Y",  strtotime($startDate));
                if ($newDate == $selectedDate) :
                    $isSelected = "selected";
                endif;
            ?>
                <option value="<?= $newDate ?>" <?= $isSelected ?>><?= $labelDate ?></option>
            <?php
                // passer au mois suivant
                $startDate = date('Y-m', strtotime("+1 months", strtotime($newDate)));
            endfor; ?>
        </select>
        <input type="submit" value="Search Free Date">
        <a href="action.php?do=searchdate&id=<?= $currVehic["id"] ?>&month=<?= $selectedDate ?>">Search Free Date</a>

        <input type="hidden" name="id" value="<?= $currVehic["id"] ?>">
    </form>

    <!-- =================DATES DISPO======================================= -->
    <form action="action.php?do=reservation" method="post">
        <table>
            <tbody>
                <tr>
                    <?php
                    var_dump($tNotFree);
                    $currMonth = date("n", strtotime($selectedDate));
                    $curYear = date("Y", strtotime($selectedDate));
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
                            <?= $i ?> <?= date("M", strtotime($selectedDate)) ?>
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
        <input type="hidden" name="id" value="<?= $currVehic["id"] ?>">
        <input type="hidden" name="month" value="<?= $selectedDate ?>">
    </form>




</body>

</html>