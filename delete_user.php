<?php
include 'DAO.php';
session_start();
if(!isset($_SESSION['aid'])){ //세션변수 aid 존재하느냐 안하느냐 확인하는 변수(isset)
	header('Location: /admin_login.html');
}
$mid = mysqli_real_escape_string($con, $_POST["mid"]); // sql injection 방지
	$sql = "DELETE FROM member WHERE `MID`=$mid"; //mid로 튜플삭제
	$result = mysqli_query($con, $sql);
	echo 'true';
	mysqli_close($con);
 ?>
