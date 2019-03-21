<?php
// id, pw 넣고 로그인 버튼 눌렀을 때 id로 db속 pw 불러와서 입력 pw 같은지  체크. 


include 'DAO.php'; 


$id = mysqli_real_escape_string($con, $_POST["id"]); // sql injection 방지


$password = mysqli_real_escape_string($con, $_POST["pwd"]);

$sql = "SELECT `PW`,`MID` , `Name`,`Birth` , `Phone`,`Email`  FROM member WHERE `ID`='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
//$hash = $row[0];



if(password_verify($password , $row['PW'])){
  session_start();	//세션을 사용하겠다는 함수
  $_SESSION['user_name'] = $row['Name']; //user_name이라는 세션 변수에 이름이 들어김
  $_SESSION['user_mid'] = $row['MID'];
  $_SESSION['user_birth'] = $row['Birth'];
  $_SESSION['user_phone'] = $row['Phone'];
  $_SESSION['user_email'] = $row['Email'];
  echo 'true';
}else{
  echo 'false';
}

mysqli_close($con);



 ?>
