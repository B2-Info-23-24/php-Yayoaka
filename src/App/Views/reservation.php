<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ca roule ma poule</title>
</head>


<body>
	<?php include "header.php" ?>
  
    <h1>Reservation <?= $currVehic["name_brand"] ?> - <?= $currVehic["name_model"] ?> </h1>

    Price: <b><?= $currVehic["price"] ?> €/Day</b>
	<br />

    <!-- =================PAYMENT======================================= -->
    <form action="action.php?do=payment" method="post">
		<h2> Dates on <?= $dateMonth ?> </h2>
		<?php 
		$totPrice = 0;
		$totDays = 0;
		foreach($tResas as $resa) : 
			$totPrice = $totPrice + $resa['total_price'];
			$totDays = $totDays + $resa['nb_day'];
		?> 
		    <input type="hidden" name="resa_ids[]" value="<?= $resa['id'] ?>">
			- reservation from <?= $resa['date_begin'] ?> to <?= $resa['date_end'] ?> (<?= $resa['nb_day'] ?> day(s), <?= $resa['total_price'] ?> €)<br />
		<?php endforeach; ?>

		<h2> Payment </h2>
		Total to pay for <?= $totDays ?> days : <b><?= $totPrice ?> €</b>
		
        <div style="text-align:center">
		<input type="submit" value="Payment <?= $totPrice ?> €">
		</div>
    </form>

</body>

</html>