<?php

include 'DAO.php';

$id=mysqli_real_escape_string($con, $_POST['id']);

$sql = "SELECT count(*) FROM `member` WHERE `id`='$id'"; // $ID는 varchar
$ret = mysqli_query($con, $sql);
// drop table 은 sql injection 공격 거의 불가
//(multi query 안 쓰니까- mysqli_query 말고 mysqli_multi_query 해야 123123; DROP TABLE abc;   -- 이런거 실행된다.(하지만 그렇게 쓰는 일 없음)
// 따라서 sql injection은 OR 1==1 위주로 막아야 한다.

$row=mysqli_fetch_array($ret);


if($ret){

if($row[0]==1){

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
