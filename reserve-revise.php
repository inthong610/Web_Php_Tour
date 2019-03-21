<?php
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['aid'])){ //세션변수 aid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: ../admin_login.html');
	}

	$rid = mysqli_real_escape_string($con, $_POST['rid']);

	$name = mysqli_real_escape_string($con, $_POST['name']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$birth = mysqli_real_escape_string($con, $_POST['birth']);
	$request = mysqli_real_escape_string($con, $_POST['request']);
	$adult_num = mysqli_real_escape_string($con, $_POST['adult_num']);
	$child_num = mysqli_real_escape_string($con, $_POST['child_num']);
	$baby_num = mysqli_real_escape_string($con, $_POST['baby_num']);
	// rid에 해당하는 예약 정보 수정
	$sql = "update reserve SET Birth='$birth' , Phone='$phone' , Email='$email' , AdultNum = $adult_num , ChildNum = $child_num , BabyNum = $baby_num , Name = '$name' , Request= '$request' WHERE rid=$rid";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	mysqli_close($con);
	header('Location: /pages/reserve_success.php'); // 입력 완료 시 페이지 이동
 ?>
