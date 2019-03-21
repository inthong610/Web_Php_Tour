<?php // 패키지 등록
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['aid'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: /admin_login.html');
	}
	// 파일이 새로 업로드 됐을 시에 처리하는 작업
	$dir_name ="./uploads/"; // 사진 파일 저장되는 폴더
	$spot_name = mysqli_real_escape_string($con, $_POST['pre_spot_img']); // spot 사진 저장 되는 경로
	$hotel_name = mysqli_real_escape_string($con,$_POST['pre_hotel_img']);; // hotel 사진 저장 되는 경로
	if($_FILES['userfile']['name'][0]!=null ){
		$spot_name = "./uploads/".date('YmdHis',time()).mt_rand().$_FILES['userfile']['name'][0]; // spot 사진 저장 되는 경로
		move_uploaded_file($_FILES['userfile']['tmp_name'][0], $spot_name); // 해당 경로에 파일 업로드
		unlink($_POST['pre_spot_img']);
	}
	if($_FILES['userfile']['name'][1]!=null ){
		$hotel_name = "./uploads/".date('YmdHis',time()).mt_rand().$_FILES['userfile']['name'][1]; // hotel 사진 저장 되는 경로
		move_uploaded_file($_FILES['userfile']['tmp_name'][1], $hotel_name);
		unlink($_POST['pre_hotel_img']);
	}
	$pid = $_POST['pid'];
	$theme =  mysqli_real_escape_string($con,$_POST['theme']);
	$country = mysqli_real_escape_string($con,$_POST['country']);
	$roomType =  mysqli_real_escape_string($con, $_POST['roomType']);
	$departure = mysqli_real_escape_string($con,$_POST['departure']);
	$cost = mysqli_real_escape_string($con,$_POST['cost']);
	$product = mysqli_real_escape_string($con,$_POST['product']);
	
	$schedule_replace = mysqli_real_escape_string($con,$_POST['schedule']);
	$info_replace = mysqli_real_escape_string($con,$_POST['info']);// 줄바꿈 제대로 출력되게 하기 위함(text box - 스케줄, info)

	// package에 정보 수정
	$sql = "update package set `DCID`=$country , `Theme`='$theme' , `RoomType`=$roomType , `Departure`='$departure' , `Product`='$product' , `COST`=$cost WHERE `PID` = $pid";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};

	// packagedetail에 정보 입력
	$sql = "update packagedetail set `Schedule`='$schedule_replace' , `Info`='$info_replace' , `spot_img`='$spot_name' , `hotel_img`='$hotel_name' WHERE `PID` = $pid";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	mysqli_close($con);
	header('Location: /pages/package_success.php'); // 입력 완료 시 페이지 이동
 ?>
