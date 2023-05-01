<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Doma</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<div>
	<div id="navbar" class="navbar">
		<li><span><a href="index.php" class="button"><img src='home.svg' ></a></span></li>
		<?php
			if (isset($_SESSION["useruid"])){
				echo "<li><span><a href='includes/logout.inc.php' class='button'><img src='logout.svg'></a></span></li>";
			}
			else{
				echo "<li><span><a href='login.php' class='button'><img src='login.svg'></a></span></li>";
			}
		?>	
	</div>
	<?php
		if (isset($_SESSION["useruid"])){
			echo "<button><a href='editor.php' ><img src='edit.svg' id='fixedButton'></a></button>";
		}
	?>
</div>