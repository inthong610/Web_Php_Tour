<?php

include 'DAO.php';

$name = mysqli_real_escape_string($con, $_POST["name"]);

$id = mysqli_real_escape_string($con, $_POST["id"]); // mysql injection 방지

$password1 = mysqli_real_escape_string($con, $_POST["pw1"]);
$password2 = mysqli_real_escape_string($con, $_POST["pw2"]);
$birth = mysqli_real_escape_string($con,$_POST["birth"]);
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
const PASSWORD_COST = ['cost'=>12]; // 가중치 기본 값은 10. 가중치 높을수록 강한 암호화
$pw = password_hash($password2, PASSWORD_DEFAULT, PASSWORD_COST);
// password_hash() 함수 내부에 salt 내장되어있다. 또한 password_hash()는 암호 알고리즘으로 bcrypt를 기본으로 사용한다.
// password_hash() = hash-algorithm(BCrypt)+cost-factor(10, 2^10 iterations)+salt(22 characters+hash-value



$sql = " INSERT INTO member(`ID`,`PW`, `Name`,`Birth`,`Phone`,`Email`) VALUES ('$id','$pw','$name','$birth','$phone','$email')";
$ret = mysqli_query($con, $sql);
echo "".mysqli_error($con);
echo 'true';

mysqli_close($con);



 ?>
