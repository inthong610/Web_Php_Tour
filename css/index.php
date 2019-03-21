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
    <header>
         <a href="http://localhost/index.php"<center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>

         <?php
          session_start();
          if(isset($_SESSION['user_name'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset)
         ?>
         <div><?=$_SESSION['user_name']?>님 환영합니다.</div> <!-- ?=는  서버의 변수를 html로 표현하라는 기호-->
         <?php }?>
     </header>
    <nav class="clearfix">
        <ul class="clearfix">
          <?php
            if(isset($_SESSION['user_name'])){//로그인이 되어있으면 로그아웃버튼이 보이고 반대도 동일
           ?>
            <li><a href="http://localhost/logout.php">로그아웃</a></li>
           <?php } else {?>
            <li><a href="http://localhost/login.php">로그인</a></li>
           <?php }?>
           <li><a href="http://localhost/signup.php">회원가입</a></li>
           <li><a href="http://localhost/mypage.php">마이페이지</a></li>
           <li><a href="http://localhost/request.php">고객센터</a></li>
        </ul>
        <a id="pull" href="#">Menu</a>
    </nav>
    <div class="container">
  <hr>

      <!-- Project One -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="img/유럽.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>

        <div class="col-md-5">
          <h3>로맨틱한 유럽 여행</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
          <a class="btn btn-primary" id="europe">유럽 상세보기</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Two -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="img/아시아.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>맛집 천국, 아시아 여행</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
          <a class="btn btn-primary" id="asia">아시아 상세보기</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Three -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="img/아메리카.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>죽기 전 꼭 가봐야할 아메리카 여행</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
          <a class="btn btn-primary" id="america">아메리카 상세보기</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Four -->
      <div class="row">

        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="img/아프리카.jpg" position="absolute" height=300px width=500px alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>힐링 여행, 아프리카 여행</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
          <a class="btn btn-primary" id="africa">아프리카 상세보기</a>
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

    </script>
  </body>

</html>
