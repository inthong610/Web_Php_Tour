<?php
	include 'DAO.php';
	$id = mysqli_real_escape_string($con, $_POST["id"]); // mysql injection 방지
	$password = mysqli_real_escape_string($con, $_POST['pw']);

	$sql = "SELECT `pw`,`aid` , `id`  FROM admin_table WHERE `ID`='$id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	if(password_verify($password , $row['pw'])){
		session_start();	//세션을 사용하겠다는 함수
		$_SESSION['admin_id'] = $row['id']; //admin_id이라는 세션 변수에 이름이 들어김
		$_SESSION['aid'] = $row['aid'];
		echo 'true';
	}else{
		echo 'false';
	}
	mysqli_close($con);

 ?>
