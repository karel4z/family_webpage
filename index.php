<?php 
include "includes/config.inc.php";
if (isset($_GET["page"])) {
	$first=($_GET["page"]-1)*25;
	$last=$_GET["page"]*25;
} else{
	header("location: ../index.php?page=1");
	exit();
}
$retval=mysqli_query($con, "SELECT `prispevky`.`ID_prispevku`, `prispevky`.`nadpis_prispevku`, `prispevky`.`obsah_prispevku`, `prispevky`.`id_tvurce`, `uzivatele`.`ID_uzivatele`, `uzivatele`.`prezdivka_uzivatele`FROM `prispevky` LEFT JOIN `uzivatele` ON `prispevky`.`id_tvurce` = `uzivatele`.`ID_uzivatele` LIMIT $first,$last");
if (!$retval) {
	die("could not get data".mysqli_error($con));
}
?>

<?php
include_once "header.php";
?>



<div id="main">
	<div id="clanek" >
		<?php
		while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
			echo "<article style='padding:5px;'><h2><a href='article.php?ar={$row['ID_prispevku']}' style='color:black;'>{$row['nadpis_prispevku']}</a></h2><p>{$row['prezdivka_uzivatele']}</p>";
			if (isset($_SESSION["useruid"]) && $_SESSION["userid"]==$row['id_tvurce']){
				echo "<form action='includes/hide.inc.php' method='post' ><input name='id' type='hidden' value='{$row['ID_prispevku']}' /><button type='submit' name='submit' style='color:red'> X </button></form>";
			}
			echo"<hr></article>";
		}
		?>
		<p style="text-align:center;"><?php 
			if ($_GET["page"]==1) {
				$pre="";
			} else {
				$stranka=$_GET["page"]-1;
				$pre= "<a href='index.php?page=$stranka'><</a>" ;
			}
			$past=$_GET["page"]+1;
			$present=$_GET["page"];
			echo $pre." $present <a href='index.php?page=$past'>></a>";
		?></p>
	</div>
</div>

<?php
include_once "footer.php";
?>