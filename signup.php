<?php
include_once "header.php";
?>



<div id="main">
	<div style="margin-left: 40%">
		<h2 >Registrace</h2>
		<form action="includes/signup.inc.php" method="post" >
			<input type="text" name="email" placeholder="Zadejte e-mail..."><br>
			<input type="text" name="uid" placeholder="Zadejte přezdívku..."><br>
			<input type="password" name="pwd" placeholder="Zadejte heslo..."><br>
			<input type="password" name="pwdrepeat" placeholder="Zopakujte heslo..."><br>
			<input type="password" name="signupkey" placeholder="Zadejte klíč..."><br>
			<button type="submit" name="submit">Registrovat</button>
		</form>
		<?php
			if (isset($_GET["error"])){
				if ($_GET["error"]=="emptyinput") {
					echo "<p>Vyplň všechna pole!</p>";
				}
				elseif ($_GET["error"]=="invaliduid") {
					echo "<p>Vyber si platné úživatelské jméno!</p>";
				}
				elseif ($_GET["error"]=="invalidemail") {
					echo "<p>Vyber si platný e-mail!</p>";
				}
				elseif ($_GET["error"]=="passwordsdontmatch") {
					echo "<p>Hesla nejsou stejná!</p>";
				}
				elseif ($_GET["error"]=="stmtfailed") {
					echo "<p>Něco se pokazilo, zkuste to znovu!</p>";
				}
				elseif ($_GET["error"]=="usernametaken") {
					echo "<p>Uživatelské jméno je zabrané!</p>";
				}
				elseif ($_GET["error"]=="keydoesntmatch") {
					echo "<p>Neplatný klíč!</p>";
				}
				elseif ($_GET["error"]=="none") {
					echo "<p>Registrace proběhla úspěšně!</p>";
				}
			}
		?>
	</div >
</div>

<?php
include_once "footer.php";
?>