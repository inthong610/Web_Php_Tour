<?php
include('../DAO.php');
$pid = mysqli_real_escape_string($con, $_GET['PID']);
session_start();
$mid = $_SESSION['user_mid'];
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>이화투어</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
  </head>
  <body>
  <form method="post" action="./detail_review.php?PID=<?=$pid?>">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="../index.php">이화투어</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="./package_detail.php?PID=<?=$pid?>">여행일정</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./detail_info.php?PID=<?=$pid?>">호텔&amp;관광지 정보</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../reserve.php?PID=<?=$pid?>">예약하기</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./detail_review.php?PID=<?=$pid?>">여행 후기</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/후기.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <?php
              $sql = "select detail_name, product from package as p, detailcountry as d where pid=$pid and p.dcid=d.dcid;";
              $ret = mysqli_query($con, $sql);

              while(  $row = mysqli_fetch_array($ret))
            {
              echo ("<h1>$row[detail_name]</h1>"); // country_name마다 CNID의 value 하나씩 넣기
              echo("<h2>$row[product] 리얼 후기</h2>");
            }
               ?>
              <span class="meta">Posted by
                <a href="http://ewhatour.ivyro.net/index.php">이화투어</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Post Content -->
    <article>
          <div style='padding-bottom:30px;width:900px;margin:0 auto;'>
            <table style="margin: 30px;">
              <td>
            <select class="form-control" name="" id="package_grade" style="height: 40px; width: 120px;">
              <option value="0" selected>별점주기</option> <!-- 조회 선택 안된 경우 -->
              <option value="1">1점</option>
              <option value="1.5">1.5점</option>
              <option value="2">2점</option>
              <option value="2.5">2.5점</option>
              <option value="3">3점</option>
              <option value="3.5">3.5점</option>
              <option value="4">4점</option>
              <option value="4.5">4.5점</option>
              <option value="5">5점</option>
            </select></td>
            <td>
           <input type="text" name='inputreview' id="re" placeholder='후기를 남겨주세요.' style='width:600px;height:45px;'>
         </input></td>
           <td>
             <?php
             if(isset($_SESSION['user_name'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset)
               $sql0="select * from reserve where mid=$mid and pid=$pid;";
               $ret0 = mysqli_query($con, $sql0);
                $row0 = mysqli_fetch_array($ret0);
                 if(isset($row0[0])){

                   ?>
                   <input type="button" class="btn btn-primary" method='post' id=ok name='review_button' value="후기 등록" style="padding:10px; font-size:16px;height:45px; width:100px;">
                 <?php } else if(!isset($row0[0])){
                     ?>
                  <input type="button" class="btn btn-primary" onclick=un() method='post' name='review_button' value="후기 등록" style="padding:10px; font-size:16px;height:45px; width:100px;">
                  <?php }
              } else { ?>
              <input type="button" class="btn btn-primary" onclick=log() method='post' name='review_button' value="후기 등록" style="padding:10px; font-size:16px;height:45px; width:100px;">
            <?php  } ?>
        </td>
           </div>
        <table class="table table-striped table-bordered table-hover" border="1" align="center" style="align-self:center;width:1000px;font-family:Lora;">
          <tr>
          <td width="100">번호</td>
          <td width="200">아이디</td>
          <td width="100">별점</td>
          <td width="600">여행 후기</td></tr>
            <?php
            $sql2 = "select id, rate, comment from review, member where member.mid=review.mid and pid=$pid;";
            $ret2=mysqli_query($con, $sql2);
            $i=1;
            while($row2 = mysqli_fetch_array($ret2)) {
              echo  "<tr>";
              echo ("<td width=\"10%\">$i</td>");
              echo ("<td width=\"20%\">$row2[id]</td>");
              echo ("<td width=\"10%\">$row2[rate]</td>");
              echo ("<td width=\"60%\">$row2[comment]</td>");
              echo  "</tr>";
              $i++;
            }
            ?>
        </table>
      </form>
        </div>

          </div>
    </article>
    <hr>
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
              <img class="img-fluid" src="img/로고.png" style="width:50%;margin-left:200px;">
            <span class="caption text-muted">여행의 벗, Ewha Tour</span>
          </div>
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
    <script>

    $("#ok").on('click', function(){

      if($("#package_grade option:selected").val()=="0"){
        alert("별점를 선택해주세요.");
      }else if(!$("#re").val()){
          alert("후기 작성을 완료하세요.");
      }else{
        $.get(
          "review_check.php",
          {
              pid: <?=$pid?>,
              rate : $("#package_grade option:selected").val(),
              comment : $("#re").val(),
          }, function(result) {
              location.href="detail_review.php?PID="+<?=$pid?>;
          });
      }
    });
        function log() {
          alert("로그인 후 이용해주세요.");
        }
        function un() {
          alert("예약 이력이 없습니다.");
        }
    </script>
  </body>
</html>
