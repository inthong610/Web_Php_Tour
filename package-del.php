

<?php // 패키지 등록 // php 이름에서 -는 서버 처리 위함, _는 html 위주
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['aid'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: /admin_login.html');
	} else{
		// package 삭제
		$pid = mysqli_real_escape_string($con,$_GET['pid']);
		$sql = "select `spot_img` , `hotel_img` from `packagedetail` WHERE `pid`=$pid";
		$ret = mysqli_query($con,$sql) or die(mysql_error());
		$row = mysqli_fetch_array($ret);

		unlink($row['spot_img']);
		unlink($row['hotel_img']);

		$sql = "delete from package WHERE `pid`=$pid";
		if(!mysqli_query($con, $sql)){
			echo "".mysqli_error($con);
		};
		mysqli_close($con);
		header('Location: /pages/package_success.php'); // 입력 완료 시 페이지 이동
	}
 ?>
