<?php 


	function loginExists($conn, $login){
		$sql = " SELECT * FROM user WHERE login = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("location: signup.php?error=stmtfailed2");
 			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $login);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($resultData)){
			return $row;

		}else{
			$result=false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}




	function loginUser($conn,$login,$pwd)
	{
		$loginExists= loginExists($conn,$login);
			if ($loginExists === false){
				header("location: login.php?error=wronglogin");
				exit();
			}

$mdp = $loginExists["pwd"];

if (!($pwd == $mdp)){
		header("location: login.php?error=wronglogin");
		exit();
	}
	else{
		session_start();
		$_SESSION["login"] = $loginExists["login"];

		header("location: index.php");
		exit();
	}
}
?>