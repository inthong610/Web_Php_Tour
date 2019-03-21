<!DOCTYPE html>
<html>
   <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>이화투어</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/mypage.css" rel="stylesheet">

  </head>
  <body>


    <form align-items:center method="post">
      <header>

        <div class="imgcontainer">
          <a href="http://ewhatour.ivyro.net"<center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>
        </div>
      </header>

       <?php
       include ('DAO.php');
       session_start();

    ?>
    <hr>
    <h3>회원정보</h3>
    <div>
       <br style='margin:10px;float:left;'>이름: <?=$_SESSION['user_name'];?> </br>
     </div>
       <div>
       <?php

       $m=$_SESSION['user_mid'];
       $sql = "select id from member where mid='$m';";
       $ret = mysqli_query($con, $sql);
       $row = mysqli_fetch_array($ret);
       echo ("<br style='margin:10px;float:left;'>아이디: $row[0]</br>");
        ?>
        </input>
      </div>

      <div><br style="margin:10px;float:left;">생년월일: <?=$_SESSION['user_birth'];?></br>
      </div>
       <div><br style="margin:10px;float:left;">전화번호: <?=$_SESSION['user_phone'];?></br>
       </div>
       <div><br style="margin:10px; float:left;">이메일: <?=$_SESSION['user_email']; ?></br>
       </div>
       <input style="margin:10px;" type="button" value="수정하기" class="btn btn-primary" onclick="window.open('check_password.php','비밀번호 확인','top=200,left=400,width=500, height=200')"></input>
       <input style="margin:10px;" type="button" value="회원탈퇴" class="btn btn-danger" onclick="check()"></input>

       <hr>
       <div><br style="margin:10px; float:left;">최근 예약정보:
         <?php
         $sql2 = "select product from reserve as r,package as p where r.mid=$m and p.pid=r.pid and Departure>now();";
         $ret2 = mysqli_query($con, $sql2);
         $row2 = mysqli_fetch_array($ret2);
         echo $row2[0];
         if($row2[0]) {
           echo("</br><br></br>");
           echo("<input style=\"margin:10px;\" type=\"button\" value=\"취소하기\" onclick=cancel() class=\"btn btn-warning\"></input>");
         } else {
           echo("없음");
         }

          ?>
            <br></br>
      </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jquery 사용을 위해 넣음 -->

    <script type="text/javascript">

function check() {
  self.window.alert('정말 탈퇴하시겠습니까?');
  window.open('user_withdrawal.php','비밀번호 확인','top=200,left=400,width=500, height=200');
}

function cancel() {
  var input=confirm('예약을 취소하시겠습니까?');
  if(input) {
    location.replace('reserve_cancel.php');
  } else {
      location.replace('mypage.php');
  }

}
    </script>
  </form>
  </body>
</html>
