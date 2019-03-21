<?php // 패키지 등록
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['aid'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: /admin_login.html');
	}
	$dir_name ="./uploads/"; // 사진 파일 저장되는 폴더
	$spot_name = "./uploads/".date('YmdHis',time()).mt_rand().$_FILES['userfile']['name'][0]; // spot 사진 저장 되는 경로
	$hotel_name = "./uploads/".date('YmdHis',time()).mt_rand().$_FILES['userfile']['name'][1]; // hotel 사진 저장 되는 경로
	move_uploaded_file($_FILES['userfile']['tmp_name'][0], $spot_name); // 해당 경로에 파일 업로드
	move_uploaded_file($_FILES['userfile']['tmp_name'][1], $hotel_name);
	$theme =  mysqli_real_escape_string($con,$_POST['theme']);
	$country = mysqli_real_escape_string($con,$_POST['country']);
	$roomType = mysqli_real_escape_string($con, $_POST['roomType']);
	$departure = mysqli_real_escape_string($con,$_POST['departure']);
	$cost = mysqli_real_escape_string($con, $_POST['cost']);
	$product = mysqli_real_escape_string($con,$_POST['product']);
	$schedule = $_POST['schedule'];
	$schedule_replace = nl2br($schedule);
	$info =  $_POST['info'];
	$info_replace = nl2br($info);// 줄바꿈 제대로 출력되게 하기 위함(text box - 스케줄, info)

	// package에 정보 입력
	$sql = "INSERT INTO package(`DCID`,`Theme`, `RoomType`,`Departure`,`Product`,`Cost`) VALUES ('$country','$theme',$roomType,'$departure','$product',$cost)";
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	$last_insert = mysqli_insert_id($con); // 마지막에 삽입된 데이터의 primary key 불러오기(package의)

	// packagedetail에 정보 입력
	$sql = "INSERT INTO packagedetail(`PID`,`Schedule`, `Info`,`spot_img`,`hotel_img`) VALUES ($last_insert,'$schedule_replace','$info_replace','$spot_name','$hotel_name')";;
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	mysqli_close($con);
	header('Location: /pages/package_success.php'); // 입력 완료 시 페이지 이동

 ?>
