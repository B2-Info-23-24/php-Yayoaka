<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ca roule ma poule</title>
</head>


<body>
    <?php include "header.php" ?>

    <h1><?= $currVehic["name_brand"] ?> - <?= $currVehic["name_model"] ?> </h1>

    <?php if (isset($_SESSION['user_logged'])) : ?>
        <a href="action.php?do=addfav&id=<?= $currVehic["id"] ?>">Add to my favorites</a>
        <br /><br />
    <?php endif; ?>

    Price: <?= $currVehic["price"] ?> €/Day<br />

    <h2> Caracteristics : </h2>
    Color: <?= $currVehic["name_color"] ?><br />
    Places: <?= $currVehic["nb_places"] ?><br />

    <h2> Description : </h2>
    <?= $currVehic["description_vehicle"] ?>
    <br />
    <br />

    <hr>
    <h2> Reservation : </h2>
    <!-- =================FILTRE SUR 6 MOIS======================================= -->
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
        <input type="submit" value="Search Free Dates">

        <input type="hidden" name="id" value="<?= $currVehic["id"] ?>">
    </form>
    <br />

    <!-- =================DATES DISPO======================================= -->
    <form action="action.php?do=reservation" method="post">
        <table>
            <tbody>
                <tr>
                    <?php
                    //var_dump($tNotFree);
                    $currMonth = date("n", strtotime($selectedDate));
                    $curYear = date("Y", strtotime($selectedDate));
                    $nbMaxDays = cal_days_in_month(CAL_GREGORIAN, $currMonth, $curYear);
                    for ($i = 1; $i <= $nbMaxDays; $i++) :
                        $bgColor = "#5C5";
                        $chkBx = "<input type='checkbox' id='chk" . $i . "' name='resa_days[]' value='" . $i . "'>";
                        if (in_array($i, $tNotFree)) :
                            $bgColor = "red";
                            $chkBx = "";
                        endif;

                        // controle si mois courant sélectionné et date passée
                        if ($selectedDate == $currDate) :
                            if ($i < date("d")) :
                                $bgColor = "grey";
                                $chkBx = "";
                            endif;
                        endif;
                    ?>

                        <td width='8%' style='padding:8px; text-align:center; background-color:<?= $bgColor ?>'>
                            <?= $chkBx ?>
                            <label for="chk<?= $i ?>">
                                <?= $i ?> <?= date("M", strtotime($selectedDate)) ?>
                            </label>
                        </td>

                    <?php
                        // changement de ligne par modulo de 10
                        if (($i % 7) == 0) :
                            echo "</tr>";
                            echo "<tr>";
                        endif;
                    endfor;
                    ?>
                </tr>
            </tbody>
        </table>
        <br />
        <div style="text-align:center">
            <input type="submit" value="Reservation">
        </div>
        <input type="hidden" name="id" value="<?= $currVehic["id"] ?>">
        <input type="hidden" name="month" value="<?= $selectedDate ?>">
    </form>

</body>

</html>