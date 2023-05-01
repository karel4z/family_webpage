<?php
function emptyInputSignup($email,$username,$pwd,$pwdRepeat,$key) {
	if (empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) || empty($key)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidUid($username) {
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email) {
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd,$pwdrepeat) {
	if ($pwd!==$pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function keyMatch($key) {
	if ($key!=="666666") {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function uidExists($conn,$username,$email) {
	$sql="SELECT * FROM uzivatele WHERE prezdivka_uzivatele=? OR email_uzivatele=?;";
	$stmt= mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt,"ss",$username,$email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result=false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $username, $pwd) {
	$sql="INSERT INTO uzivatele ( email_uzivatele, prezdivka_uzivatele, heslo_uzivatele) VALUES (?,?,?);";
	$stmt= mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt,"sss",$email,$username,$hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();
}

function emptyInputLogin($username,$pwd) {
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function loginUser($conn,$username,$pwd){
	$uidExists = uidExists($conn,$username,$username);
	if ($uidExists===false) {
		header("location: ../signup.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["heslo_uzivatele"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd===false) {
		header("location: ../signup.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd===true) {
		session_start();
		$_SESSION["userid"]=$uidExists["ID_uzivatele"];
		$_SESSION["useruid"]=$uidExists["prezdivka_uzivatele"];
		header("location: ../index.php");
		exit();
	}
}