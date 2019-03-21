<?php
const PASSWORD_COST = ['cost'=>12]; // 가중치 기본 값은 10. 가중치 높을수록 강한 암호화
$hashck = "";
function getHash($pw){
    $hashck = $pw;
    $makeHash = password_hash($hashck, PASSWORD_DEFAULT, PASSWORD_COST);
    return $makeHash;
}
// password_hash() 함수 내부에 salt 내장되어있다. 또한 password_hash()는 암호 알고리즘으로 bcrypt를 기본으로 사용한다.
// password_hash() = hash-algorithm(BCrypt)+cost-factor(10, 2^10 iterations)+salt(22 characters+hash-value

function checkPw($pwd , $hash){
  $hashck = $pwd;
if(password_verify($hashck , $hash)){
  return "true";
}else{
  return "false";
}
}


 ?>
