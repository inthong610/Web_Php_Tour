<?php

include 'DAO.php';



  $cnid = mysqli_real_escape_string($con, $_GET['cnid']);
  $theme = mysqli_real_escape_string($con,$_GET['theme']);
  $room_grade = mysqli_real_escape_string($con,$_GET['room_grade']);
  $date = mysqli_real_escape_string($con,$_GET['date']);

    // a(cnid를 가진 DCID와 Detail_name을 불러온 것)에 존재하는 DCID와 package에 존재하는 DCID가 같은 튜플들 불러옴
  $sql = "SELECT package.PID, package.DCID, package.Theme, package.RoomType, package.Departure, package.Product, package.Cost, a.Detail_name FROM package,(SELECT `DCID`, `Detail_name` FROM detailcountry WHERE `CNID`=$cnid) AS a WHERE package.`DCID`= a.`DCID`";
  if($theme!="0"){ // 테마가 있을 경우 추가 조건 붙이기
  	$sql .= " AND package.`Theme` = '$theme'";
  }
  //echo $sql;
  $sql .= " AND package.`RoomType` >= $room_grade";
  if($date!==""){
  	$sql .=" AND package.`Departure` >= date('$date')";
  } else{
  	$sql .=" AND package.`Departure` >= date(now())";
  }
  $sql.=" ORDER BY package.`Departure` ASC"; //날짜별 정렬

  $result = mysqli_query($con, $sql);
  $return_array=array();


  while($row = mysqli_fetch_assoc($result)){

    $return_array[]=$row;
  }
  echo json_encode($return_array, JSON_UNESCAPED_UNICODE); // unicode 제대로

  mysqli_close($con);


 ?>
