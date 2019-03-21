<?php
include('DAO.php');
session_start();
$mid=$_SESSION['user_mid'];
$sql ="delete from reserve where mid=$mid;";
$result = mysqli_query($con, $sql);
echo("<script>alert(\"예약이 취소되었습니다.\"); location.replace('mypage.php');</script>");
 ?>
