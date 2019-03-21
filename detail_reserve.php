<?php
include ('DAO.php');
session_start();
  if(!isset($_SESSION["pid"])){
    $pid=$_GET['PID'];
  } ?>
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
    <form method="get">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">이화투어</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">


              <li class="nav-item">

                <a class="nav-link" href="package_detail.php">여행일정</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="detail_info.php">호텔&amp;관광지 정보</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reserve.php">예약하기</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="detail_review.php">여행 후기</a>
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
              $pid_temp = $_SESSION['pid'];
              $sql = "select detail_name, product from package as p, detailcountry as d where pid=$pid_temp and p.dcid=d.dcid;";
              $ret = mysqli_query($con, $sql);
              while(  $row = mysqli_fetch_array($ret))
            {
              echo ("<h1>$row[detail_name]</h1>");
              echo("<h2>$row[product] 세부 일정</h2>");
            }

               ?>

              <span class="meta">Posted by
                <a href="http://localhost/index.php">이화투어</a>
              </span>
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
            $sql2 = "select info, schedule from packagedetail where pid=$pid_temp;";
            $ret2 = mysqli_query($con, $sql2);
            while($row = mysqli_fetch_array($ret2))
          {

            echo ("<p>$row[schedule]</p>"); // country_name마다 CNID의 value 하나씩 넣기

          }
            mysqli_close($con);
            ?>
            <input  type="hidden" value="<?=$pid?>" id="pid_hidden" name="pid">

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
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
    <input  type="hidden" value="<?=$pid?>" id="pid_hidden" name="pid">
</form>
  </body>

</html>
