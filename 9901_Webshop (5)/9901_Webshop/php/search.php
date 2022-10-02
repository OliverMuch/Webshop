<?php
$sql = "SELECT productName, category FROM product where category like '%'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

	// output data of each row

	while ($row = mysqli_fetch_assoc($result)) {
		$link = "";


		$id = str_replace(' ', '_',  $row['productName']);

		switch ($row['category']) {
			case "Equipment":
				$link = "Equipment.php#productModal#' . $id . '";
				break;
			case "Accessoires":
				$link = "Accessoires.php#productModal#' . $id . '";
				break;
			case "Nutrition":
				$link = "Nutrition.php#productModal#' . $id . '";
				break;
		}

		//Falsche seite onclick event!!
		echo '<li><a onclick=changeModal("' . $id . '") href="' . $link . '">' . $row['productName'] . '</a></li>';
	}
} else {
	echo "0 results";
}
