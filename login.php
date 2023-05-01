<?php
include_once "header.php";
?>



<div id="main">
	<div style="margin-left: 40%">
		<h2 >Přihlášení</h2>
		<form action="includes/login.inc.php" method="post" >
			<input type="text" name="uid" placeholder="Přezdívka/E-mail..."><br>
			<input type="password" name="pwd" placeholder="Zadejte heslo..."><br>
			<button type="submit" name="submit">Přihlásit</button>
		</form>
		<?php
			if (isset($_GET["error"])){
				if ($_GET["error"]=="emptyinput") {
					echo "<p>Vyplň všechna pole!</p>";
				}
				elseif ($_GET["error"]=="wronglogin") {
					echo "<p>Nesprávné přihlašovací údaje!</p>";
				}
			}
		?>
	</div >
</div>

<?php
include_once "footer.php";
?>