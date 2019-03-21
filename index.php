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
    <link href="css/1-col-portfolio.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
       	   <script type="text/javascript">


       	      $(function(){
       	      	var pull=$('#pull');
       	      	    menu=$('nav ul');
       	      	    menuHeight=menu.height();
       	      $(pull).on('click', function(e){
       	      	e.preventDefault();
       	      	menu.slideToggle();
       	      });
       	      $(window).resize(function(){
       	      	var w=$(window).width();
       	      	if(w>600 && menu.is(':hidden'))
       	      		{menu.removeAttr('style');}
       	      });
       	  });
       	   </script>
  </head>

  <body>
    <!-- Navigation -->
    <header style="padding:20px;">
         <a href="http://ewhatour.ivyro.net/index.php"><center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px></center></a>

         <?php
          session_start();
          if(isset($_SESSION['user_name'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset)
         ?>
         <div style="float:right;"><strong><?=$_SESSION['user_name']?>님 환영합니다.</strong></div> <!-- ?=는  서버의 변수를 html로 표현하라는 기호-->
         <?php }?>
     </header>
    <nav class="clearfix">
        <ul class="clearfix">
          <?php
            if(isset($_SESSION['user_name'])){//로그인이 되어있으면 로그아웃버튼이 보이고 반대도 동일
           ?>
            <li><a href="http://ewhatour.ivyro.net/logout.php">로그아웃</a></li>
           <?php } else {?>
            <li><a href="http://ewhatour.ivyro.net/login.php">로그인</a></li>
           <?php }
             if(isset($_SESSION['user_name'])){?>
               <li><a onclick=check()>회원탈퇴</a></li>
               <?php } else {?>
           <li><a href="http://ewhatour.ivyro.net/signup.php">회원가입</a></li>
           <?php
          }
             if(isset($_SESSION['user_name'])){//로그인이 되어있으면 로그아웃버튼이 보이고 반대도 동일
            ?>
           <li><a href="http://ewhatour.ivyro.net/mypage.php">마이페이지</a></li>
           <?php } else {?>
             <li><a onclick=mypage()>마이페이지</a></li>
              <?php }?>
           <li><a href="http://ewhatour.ivyro.net/request.php">고객센터</a></li>
        </ul>
        <a id="pull" href="#">Menu</a>
    </nav>
    <div class="container">
  <hr>

      <!-- Project One -->
      <div class="row">
        <div class="col-md-6">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://imageshack.com/a/img924/3420/8El9AL.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>

        <div class="col-md-5" style="border-radius:20px;background:#fcffe1;">
          <h3><strong>로맨틱한 유럽 여행</strong></h3><br></br>
          <p><font size="3.5px"style="float:center;">2017년은 마음만 먹으면 매달 여행할 수 있을 만큼 연휴가 많았던 해였습니다.
            마지막까지 여행을 즐기며 특별한 한 해를 보내고 싶다면 유럽 여행을 떠나보시는건 어떤가요? 이화투어에서는 다양한 유럽 크리스마스 패키지를 제안합니다!
            동유럽, 서유럽, 남유럽, 동유럽 별로 패키지를 상세하게 보실 수 있습니다.<font></p>
          <a class="btn btn-primary" id="europe" style="margin:10px;">유럽 상세보기</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Two -->
      <div class="row">
        <div class="col-md-6">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://imageshack.com/a/img924/3903/WMLUSI.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>
        <div class="col-md-5" style="border-radius:20px;background:#fcffe1;">
          <h3><strong>맛집 투어, 아시아 여행</strong></h3><br></br>
          <p><font size="3.5px">이화투어에서 여러분의 아시아 맛집탐방여행을 계획하세요!
            아시아의 관광명소와 여행지 정보를 통해 최고의 여행 패키지가 예약 가능합니다. 부담없는 가격으로 아시아에서 한 해를 마무리하세요!
            동남아시아, 서남아시아, 중국/홍콩/대만, 일본의 여행지 정보를 볼 수 있습니다.<font></p>
          <a class="btn btn-primary" id="asia" style="margin:10px;">아시아 상세보기</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Three -->
      <div class="row">
        <div class="col-md-6" >
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://imageshack.com/a/img924/6660/R8MwoR.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>
        <div class="col-md-5" style="border-radius:20px;background:#fcffe1;">
          <h3><strong>꿈꾸던 여행, 아메리카 여행</strong></h3><br></br>
          <p><font size="3.5px">꿈꾸던 곳으로의 여행, 아메리카 여행! 넓은 아메리카에서 원하는 여행컨셉이 있다면, 혼자서 여행 계획을 세우기 힘들다면! 이화투어의 아메리카 패키지에서 여행날짜/가고싶은 지역/테마를 통해 맞춤여행을 즐겨보세요! 상세보기를
            누르시면 동부/서부 미국과 북아메리카, 남아메이카 패키지 정보를 보실 수 있습니다.<font></p>
          <a class="btn btn-primary" id="america" style="margin:10px;">아메리카 상세보기</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Four -->
      <div class="row">

        <div class="col-md-6">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://imageshack.com/a/img923/228/Nny66s.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>
        <div class="col-md-5" style="border-radius:20px;background:#fcffe1;">
          <h3><strong>힐링 여행, 아프리카 여행</strong></h3><br></br>
          <p><font size="3.5px">신비한 아프리카 여행을 이화투어에서 즐기실 수 있습니다. 아름다운 경관은 물론 자연의 신선함도 만끽하실 수 있습니다. 아프리카 속 신비의 도시는 한껏 담는 시간! 이화투어에서 동/서아프리카, 남/중앙아프리카, 북아프리카, 인도의 패키지 정보를 확인하세요!</font></p>
          <a class="btn btn-primary" id="africa" style="margin:10px;">아프리카 상세보기</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Pagination -->


    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 우혜진 최영림 홍정수</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

     $("#europe").on('click',function(){  // jquery. 유럽 버튼 눌렀을 때 실행

       location.href="SelectPackage.php?CID=1";

     });


     $("#asia").on('click',function(){  // 아시아 버튼 눌렀을 때 실행

       location.href="SelectPackage.php?CID=2";

     });

     $("#america").on('click',function(){  // 아메리카 버튼 눌렀을 때 실행

       location.href="SelectPackage.php?CID=3";

     });

     $("#africa").on('click',function(){  // 아프리카 버튼 눌렀을 때 실행

       location.href="SelectPackage.php?CID=4";

     });

     function mypage() {
       alert("로그인 후 이용 가능합니다.");
        location.href="login.php";
     }

     function check() {
       self.window.alert('정말 탈퇴하시겠습니까?');
       window.open('user_withdrawal.php','비밀번호 확인','top=200,left=400,width=500, height=200');
     }

    </script>
  </body>

</html>
