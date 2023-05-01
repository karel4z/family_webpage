<?php

if (isset($_POST["submit"])) {
	$id=$_POST['id'];
    require_once "dbh.inc.php";
    require_once "functions.inc.php";
	$retval=mysqli_query($conn, "SELECT title, short_desc, long_desc, id FROM contents WHERE id='{$id}'");
        if (!$retval) {
	        die("could not get data".mysqli_error($con));
        }
    $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
    hideArticle($conn,$row['title'],$row['short_desc'],$row['long_desc'],$id);
}
else {
	header("location: ../articles.php?page={$_GET['page']}");
	exit();
}