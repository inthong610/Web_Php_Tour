<?php
include ('../DAO.php');
      $pid = mysqli_real_escape_string($con, $_GET['PID']);
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
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="./css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>
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
              <a class="nav-link" href="./detail_package.php?PID=<?=$pid?>">여행일정</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./detail_info.php?PID=<?=$pid?>">호텔&amp;관광지 정보</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../reserve.php?PID=<?=$pid?>">예약하기</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./detail_review.php?PID=<?=$pid?>">여행후기</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/달력.jpg')">
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
              echo ("<center><h1>$row[detail_name]</h1></center>");
              echo("<center><h2 style=\"font-family:Lora;\">$row[product] 세부 일정</h2></center>");
            }

               ?>

            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            $sql2 = "select Departure, Cost, schedule from package, packagedetail where packagedetail.pid=$pid and package.pid=$pid;";
            $ret2 = mysqli_query($con, $sql2);
            $row = mysqli_fetch_array($ret2);

            echo ("<p style=\"font-family:Lora;\"><strong>가격:&nbsp; $row[1]원</strong></p>");
            echo ("<p style=\"font-family:Lora;\"><strong>출발:&nbsp;");
            echo $row[0];
            echo("</strong></p>");

            echo ("<p style=\"font-family:Lora;\"><strong>[일정표]</strong></p>");
            echo ("<p style=\"font-family:Lora;\">");
            echo nl2br($row[2]);
            echo ("</p>");

            mysqli_close($con);
            ?>
            <br></br>
            <hr>
            <br></br>
            <strong>* 유의사항 *</strong>
            <p>호텔은 동급의 다른 호텔로 변경 될 수 있으며, 출발 3일전 확정일정표를 확인해 주시기 바랍니다.</p>
            <p> 주말 및 연휴기간에는 현지 교통 혼잡으로 인해 일정이 다소 변경 될 수 있습니다.</P>
            <p>본인귀책사유에 의해 입국이 거절될 경우 지불하신 여행경비는 환불되지 않습니다.</p>
            <p> 최종계약시 예약한 여행사에서 해외여행계약서 작성을 해 주시기 바랍니다.</p>
            <p>(※ 예약시 확인한 가능좌석수는 항공사와 현지호텔 사정에 의해 증가 또는 감소 등 변경될 수 있습니다. 최종확정일정표를 확인해주세요.)</p>
            <a href="#">
              <img class="img-fluid" src="img/로고.png" alt="">
            </a>
            <span class="caption text-muted">여행의 벗, Ewha Tour</span>
          </div>
        </div>
      </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">

            <p class="copyright text-muted">Copyright Ewha Tour 2017</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
