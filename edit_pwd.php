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

include ('DAO.php');
session_start();
$password1 = mysqli_real_escape_string($con, $_POST["pwd1"]);
$password2= mysqli_real_escape_string($con, $_POST["pwd2"]);
$password3=mysqli_real_escape_string($con, $_POST["pwd3"]);
$mid=  $_SESSION['user_mid'];
$sql = "SELECT `PW`  FROM member WHERE `MID`=$mid";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

const PASSWORD_COST = ['cost'=>12];
$pw = password_hash($password2, PASSWORD_DEFAULT, PASSWORD_COST);
if(password_verify($password1 , $row['PW'])){
  if($password2==$password3 && $password1!=$password2) {

    $sql2 = "update member set pw='$pw' where mid=$mid;";
    $ret = mysqli_query($con, $sql2);
    echo("<br></br><center><br><label>비밀번호가 변경되었습니다.</label></br></center>");
    echo("<br></br><center><input type=\"button\" class=\"btn btn-success\" onclick=\"Sub()\" value=\"확인\"></input></center>");

  }else if($password1==$password2){
    echo("<script name=javascript>self.window.alert('변경사항이 없습니다.');location.replace('http://ewhatour.ivyro.net/edit_password.php');</script>");
  } else {
    echo("<script name=javascript>self.window.alert('신규 비밀번호가 맞지 않습니다.다시 입력해주세요.');location.replace('http://ewhatour.ivyro.net/edit_password.php');</script>");

  }

} else {
  echo("<script name=javascript>self.window.alert('현재 비밀번호가 틀렸습니다. 다시 입력해주세요.');location.replace('http://ewhatour.ivyro.net/edit_password.php');</script>");
}

?>

<script>

function Sub(){
window.opener.top.location.href="edit_mypage.php";
//window.opener.top.location.reload();//새로고침
window.close()
}
</script>
