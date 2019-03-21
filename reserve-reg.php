<?php 
	include 'DAO.php';
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$adult=mysqli_real_escape_string($con,$_POST['adult']);
	$child=mysqli_real_escape_string($con,$_POST['child']);
	$baby=mysqli_real_escape_string($con,$_POST['baby']);
	$phone=mysqli_real_escape_string($con,$_POST['phone']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$birth=mysqli_real_escape_string($con,$_POST['birth_date']);
	$request=mysqli_real_escape_string($con,$_POST['request']);
	$pid=mysqli_real_escape_string($con,$_POST['pid']);
	$sql;
	session_start();
	if(isset($_SESSION['user_mid'])){  //세션변수 user_mid 존재하느냐 안하느냐 확인하는 함수(isset) . 회원인 경우(로그인)
	    $sql = "INSERT INTO reserve(`PID`,`MID`,`Name`, `Birth`,`Phone`,`Email`,`AdultNum`,`ChildNum`,`BabyNum` , `Request`) VALUES ($pid,$_SESSION[user_mid],'$name','$birth','$phone','$email',$adult,$child , $baby , '$request')";
	} else{ // 비회원인 경우
	    $sql = "INSERT INTO reserve(`PID`,`Name`, `Birth`,`Phone`,`Email`,`AdultNum`,`ChildNum`,`BabyNum` , `Request`) VALUES ($pid,'$name','$birth','$phone','$email',$adult,$child , $baby , '$request')";
	}
	
	if(!mysqli_query($con, $sql)){
		echo "".mysqli_error($con);
	};
	mysqli_close($con);
	echo "true";
?>