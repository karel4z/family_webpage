<?php

if (isset($_POST["submit"])) {
	
	$email=$_POST["email"];
	$username=$_POST["uid"];
	$pwd=$_POST["pwd"];
	$pwdRepeat=$_POST["pwdrepeat"];
	$key=$_POST["signupkey"];

	require_once "dbh.inc.php";
	require_once "functions.inc.php";

	if (emptyInputSignup($email,$username,$pwd,$pwdRepeat,$key)!==false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username)!==false) {
		header("location: ../signup.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email)!==false) {
		header("location: ../signup.php?error=invalidemail");
		exit();
	}
	if (pwdMatch($pwd,$pwdRepeat)!==false) {
		header("location: ../signup.php?error=passwordsdontmatch");
		exit();
	}
	if (keyMatch($key)!==false) {
		header("location: ../signup.php?error=keydoesntmatch");
		exit();
	}
	if (uidExists($conn,$username,$email)!==false) {
		header("location: ../signup.php?error=usernameoremailtaken");
		exit();
	}
	createUser($conn, $email, $username, $pwd);
}
else {
	header("location: ../signup.php");
}
