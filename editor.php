<?php
include_once "header.php";
?>

<?php 
include "includes/config.inc.php";

if(isset($_POST['submit'])){

  $title = $_POST['title'];
  $long_desc = $_POST['long_desc'];
  $id_tvurce = $_SESSION['userid'];

  if($title != ''){

    mysqli_query($con, "INSERT INTO prispevky(nadpis_prispevku,obsah_prispevku,id_tvurce) VALUES('".$title."','".$long_desc."','".$id_tvurce."') ");
    header('location: index.php');
  }
}

?>

<?php
if(!isset($_SESSION['useruid'])){
header('location: index.php');
}
?>


<div id="main">
	<div style="margin-left: 5%">
		<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
		<form method='post' action='' style="font-family: 'Verdana';">
			<h2 >Nadpis příspěvku :</h2>
			<input type="text" name="title" ><br>

			<p>Obsah příspěvku: </p>
			<textarea id='long_desc' name='long_desc' ></textarea><br>

			<input type="submit" name="submit" value="Zveřejnit" style="margin-left: auto;margin-right:auto;display:block;"><br>
			<script type="text/javascript">
				// Initialize CKEditor
				CKEDITOR.replace('long_desc',{
				width: "1050px",
				height: "300px"
				}); 
			</script>
		</form>
	</div>
</div>

<?php
include_once "footer.php";
?>