<?php

include 'DAO.php';



$id = mysqli_real_escape_string($con, $_POST["id"]); // mysql injection 방지
$password = mysqli_real_escape_string($con, $_POST["pwd"]);


$sql = "SELECT `MID`, `PW` FROM member WHERE `ID`='$id'"; // delete나 update는 항상 테이블의 primary key를 이용해서 쿼리를 실행해야함!!
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);



if(password_verify($password , $row['PW'])){
	$mid = $row['MID'];		//memeber 테이블의 primarykey인 mid 할당
  $sql = "DELETE FROM member WHERE `MID`=$mid"; //mid로 튜플삭제
  $result = mysqli_query($con, $sql);
  $session_start();		//세션관련한걸 사용하려면 써야함
  $session_destroy();	//세션삭제
  echo 'true';
}else{
  echo 'false';
}

mysqli_close($con);


 ?>
