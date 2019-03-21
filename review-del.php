<?php
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['aid'])){ //세션변수 aid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: ../admin_login.html');
	} else{
		// 해당 rid 리뷰 삭제
		$rid = mysqli_real_escape_string($con,$_GET['rid']);
		$sql = "delete from review WHERE `RID`=$rid";
		if(!mysqli_query($con, $sql)){
			echo "".mysqli_error($con);
		};
		mysqli_close($con);
		header('Location: /pages/reserve_success.php'); // 입력 완료 시 페이지 이동
	}
 ?>
