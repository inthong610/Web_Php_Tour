<?php

include ('../DAO.php');

$rate = mysqli_real_escape_string($con, $_GET['rate']);
$comment = mysqli_real_escape_string($con, $_GET['comment']);
$pid = mysqli_real_escape_string($con, $_GET['pid']);

session_start();
$mid = $_SESSION["user_mid"];
$sql = "insert into review values($pid,LAST_INSERT_ID(),$mid,'$comment',$rate);";
$result = mysqli_query($con, $sql);
  $result = mysqli_query($con, $sql);
  mysqli_close($con);
 ?>
