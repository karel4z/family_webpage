<?php 
include "includes/config.inc.php";
$article=$_GET["ar"];
$retval=mysqli_query($con, "SELECT nadpis_prispevku, obsah_prispevku, ID_prispevku FROM prispevky WHERE ID_prispevku='{$article}'");
if (!$retval) {
	die("could not get data".mysqli_error($con));
}
?>
<?php
	include_once 'header.php'
?>

	<div id="main">
		<div id="clanek"">
			<?php
			while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
				echo "<article style='padding:5px;'><h2 style='padding:5px;'>{$row['nadpis_prispevku']}</h2><hr><p style='padding:5px;'>{$row['obsah_prispevku']}</p></article>";
			}
			mysqli_close($con)
			?>
		</div>
	</div>

<?php
	include_once 'footer.php'
?>