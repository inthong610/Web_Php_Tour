<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body style="background:#d9d9d9;">

  </body>
</html>
<?php

include('DAO.php');
session_start();
$password = mysqli_real_escape_string($con, $_POST["pwd"]);
$mid=  $_SESSION['user_mid'];
$sql = "SELECT `PW`  FROM member WHERE `MID`=$mid";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
if(password_verify($password , $row['PW'])){
  echo("<center><br><label>확인되었습니다.<label></br></center>");
  echo("<br></br><center><input type=\"button\" onclick=\"Sub()\" class=\"btn btn-success\" value=\"확인\"></input></center>");
} else {
  echo("<script name=javascript>self.window.alert('비밀번호가 틀렸습니다. 다시 입력해주세요.');location.replace('http://ewhatour.ivyro.net/check_password.php');</script>");
}
 ?>
<script>

function Sub(){
window.opener.top.location.href="edit_mypage.php";
//window.opener.top.location.reload();//새로고침
window.close()
}
</script>
