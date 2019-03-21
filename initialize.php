<?php
include 'DAO.php';

$id = mysqli_real_escape_string($con, "admin"); // sql injection 방지(이 경우, 방지 필요없으나 혹시나 해서 방지)
$pw = mysqli_real_escape_string($con, "1234");
const PASSWORD_COST = ['cost'=>12]; // 가중치 기본 값은 10. 가중치 높을수록 강한 암호화
$pw = password_hash($pw, PASSWORD_DEFAULT, PASSWORD_COST);


// admin table에 ID,PW 삽입 하기 위한 페이지. 로딩만 시키면 됨

$sql = " INSERT INTO admin_table(`ID`,`PW`) VALUES ('$id','$pw')";
$ret = mysqli_query($con, $sql);
echo "".mysqli_error($con);

mysqli_close($con);
 ?>
