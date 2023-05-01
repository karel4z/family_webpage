<?php

if (isset($_POST["submit"])) {
	$id=$_POST['id'];
    require_once "dbh.inc.php";
    $sqlTwo="DELETE FROM `prispevky` WHERE id='{$id}'";
    mysqli_query($conn,$sqlTwo);
    header("location: ../publicate_articles.php");
    exit();
}
else {
	header("location: ../publicate_articles.php?page={$_GET['page']}");
	exit();
}
