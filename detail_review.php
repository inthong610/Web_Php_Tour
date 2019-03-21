<?php
include('DAO.php');

session_start(); ?>
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
  <form method="post" action="detail_review.php">
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
    <header class="masthead" style="background-image: url('img/후기.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <?php
              $pid_dr =$_SESSION['PID'];
              $sql = "select detail_name, product from package as p, detailcountry as d where pid=$pid_dr and p.dcid=d.dcid;";
              $ret = mysqli_query($con, $sql);

              while(  $row = mysqli_fetch_array($ret))
            {
              echo ("<h1>$row[detail_name]</h1>"); // country_name마다 CNID의 value 하나씩 넣기
              echo("<h2>$row[product] 리얼 후기</h2>");
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

            <div>
            <center><div style="padding:20px;">
          <label style="font-family:Lora;">별점:</label>
          <input type='radio' name='Radio' value='1' />1
          <input type='radio' name='Radio' value='2' checked='checked' /> 2
          <input type='radio' name='Radio' value='3' checked='checked' /> 3
          <input type='radio' name='Radio' value='4' checked='checked' /> 4
          <input type='radio' name='Radio' value='5' checked='checked' /> 5
        </div>

          <div style='padding-bottom:30px;width:900px;position:center;'>
          <div style='float:left;'>
          <textarea name='inputreview' placeholder='후기를 남겨주세요.' style='width:800px;height:100px;'>
          </textarea></div>
          <div style='float:right;text:13px;top:auto;'><input type="button" class="btn btn-danger disabled"  method='post' name='review_button' value="후기 등록" style="padding:10px; font-size:16px;height:100px; width:100px;">
        </div></div>


        <table class="table table-striped table-bordered table-hover" border="1" align="center" style="align-self:center;width:1000px;font-family:Lora;">
          <tr>
          <td width="100">번호</td>
          <td width="200">아이디</td>
          <td width="100">별점</td>
          <td width="600">여행 후기</td></tr>


            <?php
            echo("<h1>$_SESSION['id']</h1>");
            $sql2 = "select RID, id, rate, comment from review, member where member.mid=review.mid and pid=$pid_dr;";
            $ret2=mysqli_query($con, $sql2);
            while($row2 = mysqli_fetch_array($ret2)) {
              echo  "<tr>";
              echo ("<td width=\"10%\">$row2[RID]</td>");
              echo ("<td width=\"20%\">$row2[id]</td>");
              echo ("<td width=\"10%\">$row2[rate]</td>");
              echo ("<td width=\"60%\">$row2[comment]</td>");
              echo  "</tr>";
            }
            ?>

        </table>
      </form>
        </div>



          </div>

    </article>

    <hr>

    <!-- Footer -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
