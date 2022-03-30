<!DOCTYPE html>
<html>

<head>
	<title>Image Upload Using PHP</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
	</style>
</head>

<body>
	<?php if (isset($_GET['error'])) : ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
	<form action="upload.php" method="post" enctype="multipart/form-data">

		<input type="text" placeholder="Title 3 to 4 words" name="title" required style="height: 200px; width: 500px"><br><br>

		<input type="text" placeholder="text max 20 words" name="text" required style="height: 200px; width: 500px"><br><br>

		<input type="file" name="my_image" placeholder="Foto" required><br><br>

		<input type="submit" name="submit" value="Sturen">

	</form>
</body>

</html>