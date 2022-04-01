<?php

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "basf_db");

	if (!$conn) {
		echo "Connection failed!";
		exit();
	}

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	$title = $_POST['title'];
	$text = $_POST['text'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, uw bestand is te groot.";
			header("Location: index.php?error=$em");
		} else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
				$img_upload_path = '../../news_images/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO news(userid, title, text, image) 
				        VALUES('$_SESSION[ingelogd_userID]','$title','$text','$new_img_name')";
				mysqli_query($conn, $sql);
				echo "<script>
				alert('Gelukt');
				window.location.href='index.php';
				</script>";
			} else {
				$em = "U kunt geen bestanden van dit type uploaden.";
				header("Location: index.php?error=$em");
			}
		}
	} else {
		$em = "Er is een onbekende fout opgetreden!";
		header("Location: index.php?error=$em");
	}
} else {
	header("Location: index.php");
}

