<?php // 패키지 등록
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['aid'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: /admin_login.html');
	}
	$contents =  mysqli_real_escape_string($con,$_POST['contents']);
	$bid = mysqli_real_escape_string($con,$_POST['bid']);

	// package에 정보 입력
	$sql = "INSERT INTO board_reply(`BID`,`contents`) VALUES ($bid,'$contents')";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	$sql = "UPDATE board SET `board`.reply_num= `board`.reply_num+1 WHERE `BID`=$bid";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	mysqli_close($con);
	echo "true";

 ?>
