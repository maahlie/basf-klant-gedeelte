<?php 

$conn = mysqli_connect("localhost", "root", "", "basf_db");

if (!$conn) {
	echo "Connection failed!";
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
		h1{
			margin: 30px;
			padding: 30px;
		}
		h3{
			margin: 30px;
			padding: 30px
		}
		img{
			width: 50%;
			height: 50%;
			margin: 30px;
			padding: 30px;
		}
	</style>
</head>
<body>
	
<?php 
$sql = "SELECT * FROM news"; // ORDER BY id DESC
$res = mysqli_query($conn,  $sql);

if (mysqli_num_rows($res) > 0) {
	while ($images = mysqli_fetch_assoc($res)) {  ?>
  <H1><?=$images['title']?></H1> <br/>
   <h3><?=$images['text']?></h3> <br/>

   <!-- <div class="alb"> -->
	   <img src="../../news_images/<?=$images['image']?>"> <br/>
   <!-- </div> -->
		
<?php } }?>
</body>
</html>