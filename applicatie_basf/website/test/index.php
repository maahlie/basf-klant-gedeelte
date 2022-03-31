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

		<input type="text" placeholder="Title max 4 words" name="title" id="title" autocomplete="off" required style="height: 200px; width: 500px"><br><br>

		<input type="text" placeholder="text max 20 words" name="text" id="text" autocomplete="off" required style="height: 200px; width: 500px"><br><br>

		<input type="file" name="my_image" placeholder="Foto" required><br><br>

		<input type="submit" name="submit" value="Sturen">

	</form>
	<script>
		 function maxwords(id, max) {
			// Add event handler for event that can be cancelled and prevent excessive data
			// from ever getting into the textbox
			document.getElementById(id).addEventListener("keypress", function(evt) {

				// Get value of textbox and split into array where there is one or more continous spaces
				var words = this.value.split(/\s+/);
				var numWords = words.length; // Get # of words in array
				var maxWords = max;

				// If we are at the limit and the key pressed wasn't BACKSPACE or DELETE,
				// don't allow any more input
				if (numWords > maxWords) {
					evt.preventDefault(); // Cancel event
					alert("Woordlimiet bereikt");
				}
			});
		}
		maxwords("title", 4);
		maxwords("text", 20);
	</script>
</body>

</html>