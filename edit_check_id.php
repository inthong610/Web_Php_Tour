<?php

include 'DAO.php';

$id = mysqli_real_escape_string($con, $_POST["id"]);
$sql = "SELECT count(*) FROM `member` WHERE `id`='$id'"; // $ID는 varchar
$ret = mysqli_query($con, $sql);
$row=mysqli_fetch_array($ret);
session_start();
$m=$_SESSION['user_mid'];
$sql2 = "select id from member where mid='$m';";
$ret2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_array($ret2);

if($ret){

if($row[0]==1 && $row2[0]!=$id){

  echo 'false'; // id가 있을 때(이미 사용 중인 id)

}else{

  echo 'true'; // id가 없을 때
}

}else{
  echo "userTBL 데이터 조회 실패!!"."<br>";
  echo "실패 원인 : ".mysqli_error($con);
  exit();


}

mysqli_close($con);



 ?>
