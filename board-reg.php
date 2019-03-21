<?php // 패키지 등록
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['user_mid'])){ //세션변수 user_mid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: index.php');
	}
	
	$contents =  mysqli_real_escape_string($con,$_POST['contents']);
	$title = mysqli_real_escape_string($con,$_POST['title']);
	
	

	// 게시글 등록(악의적 공격 막기 위해 폼이나 url에서 mid 입력 방지하기 위해 ssesion 이용해서 mid 받아옴)
	$sql = "INSERT INTO board(`MID`,`title`, `contents`) VALUES ($_SESSION[user_mid],'$title','$contents')";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	// packagedetail에 정보 입력
	mysqli_close($con);
	echo "true";

 ?>
