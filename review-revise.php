<?php
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['aid'])){ //세션변수 aid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: ../admin_login.html');
	}

	$rid = mysqli_real_escape_string($con, $_POST['rid']);
	$comment = mysqli_real_escape_string($con, $_POST['comment']);
	// 해당 rid에 대한 리뷰 수정
	$sql = "update `review` SET `Comment`='$comment' WHERE `RID`=$rid";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	mysqli_close($con);
	header('Location: /pages/reserve_success.php'); // 입력 완료 시 페이지 이동
 ?>
