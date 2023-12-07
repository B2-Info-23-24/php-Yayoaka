<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ca roule ma poule</title>
</head>


<body>
	<?php include "header.php" ?>

	<h1><?= $currUser["name"] ?> <?= $currUser["firstname"] ?></h1>

	<h2> User Information : </h2>
	Phone: <?= $currUser["nb_phone"] ?><br />
	Mail: <?= $currUser["mail"] ?><br />
	Password : ***************** <?php //echo $currUser["password"] 
									?>
	<br />
	<br />

	<hr>

	<h2> My Reservations : </h2>
	<ul>
		<?php foreach ($tMyResas as $resa) : ?>

			<li>Vehicle #<?= $resa['id_vehicle'] ?> from <?= $resa['date_begin'] ?> to <?= $resa['date_end'] ?>: <?= ($resa['state'] == 1 ? 'Payed' : 'Not payed!') ?></li>

		<?php endforeach; ?>
	</ul>

	<h2> My Favorites : </h2>
	<ul>
		<?php foreach ($tMyFav as $fav) : ?>

			<li><a href="action.php?do=searchdate&amp;id=<?= $fav['id_vehicle'] ?>"> <?= $fav['name_brand'] ?> <?= $fav['name_model'] ?> </a></li>

		<?php endforeach; ?>
	</ul>
</body>

</html>