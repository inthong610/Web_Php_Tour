<?php

include 'DAO.php';
session_start();
$mid = $_SESSION['user_mid'];
$name = mysqli_real_escape_string($con, $_POST["name"]);
$id = mysqli_real_escape_string($con, $_POST["id"]); // mysql injection 방지
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);

$sql="update member set id='$id', name='$name',phone='$phone', email='$email' where `MID`=$mid;";
$ret = mysqli_query($con, $sql);


$_SESSION['user_name'] = $name; //user_name이라는 세션 변수에 이름이 들어김
$_SESSION['user_phone'] = $phone;
$_SESSION['user_email'] = $email;
echo "".mysqli_error($con);

echo 'true';

mysqli_close($con);
 ?>
