<?php // 패키지 등록
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['user_mid'])){ //세션변수 user_mid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 메인 창으로 이동
		header('Location: index.php');
	} else {
		$contents =  mysqli_real_escape_string($con,$_POST['contents']);
		$title = mysqli_real_escape_string($con,$_POST['title']);
		$bid = mysqli_real_escape_string($con,$_POST['bid']);
		
		// 게시글 수정(악의적 공격 막기 위해 폼이나 url에서 mid 입력 방지하기 위해 ssesion 이용해서 mid 받아옴)
		// bid를 알고 있어도 세션에 저장된 mid가 일치하지 않으면 수정 불가
		$sql = "Update board set `title`='$title' , `contents`='$contents' WHERE `BID`=$bid AND `MID`=$_SESSION[user_mid]";
		if(!mysqli_query($con, $sql)){
			echo "".mysqli_error($con);
		};

		mysqli_close($con);
		echo "true";
	}
 ?>
