
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



$bid = "select `BID` from board WHERE `MID`=$mid"; // 모든 memeber 정보 출력


$bidRes = mysqli_query($con, $bid);



$delBoardReply = "delete from board_reply WHERE `BID`= 0"; // 탈퇴 시 게시글 댓글 삭제(게시글을 작성하지 않은 경우를 위하여 BID를 0으로)


while($bidRow = mysqli_fetch_array($bidRes))  // 탈퇴 시 게시글 댓글 삭제(여러개인 경우)
{
    $delBoardReply = "".$delBoardReply." or `BID`=  $bidRow[BID] ";
}


$delReserve = "delete from reserve WHERE `MID`=$mid "; // 탈퇴 시 예약 정보 삭제
$delBoard = "delete from board WHERE `MID`=$mid"; // 탈퇴 시 게시글 삭제
$delReview = "delete from review WHERE `MID`=$mid";



$res2 = mysqli_query($con, $delBoardReply);

$res = mysqli_query($con, $delReserve);
$res3 = mysqli_query($con, $delBoard);
$res4 = mysqli_query($con, $delReview);

$sql2="delete from member where `MID`=$mid";

$result2=mysqli_query($con, $sql2);


if(password_verify($password , $row['PW'])){
  echo("<center><br><label>탈퇴 완료하였습니다.</label></br></center>");
  session_destroy();
  echo("<center><input type=\"button\" class=\"btn btn-primary\" onclick=\"Sub()\" value=\"홈으로\"></input></center>");

} else {
  echo("<script name=javascript>self.window.alert('비밀번호가 틀렸습니다. 다시 입력해주세요.');location.replace('http://ewhatour.ivyro.net/user_withdrawal.php');</script>");
}



 ?>


<script>

function Sub(){
window.opener.top.location.href="index.php";
//window.opener.top.location.reload();//새로고침
window.close()
}
</script>
