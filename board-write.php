<?php // 패키지 등록
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['user_name'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: /board.php'); // 미로그인시 게시글 작성 불가, 게시판 메인으로 이동
	}
	?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>이화투어</title>
  	    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="css/index_main.css">
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
     
       <header>
         <a href="/index.php"><center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px></center></a>

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
   	         	<li><a href="/logout.php">로그아웃</a></li>
   	         <?php } else {?>
   	         	<li><a href="/login.php">로그인</a></li>
   	         <?php }?>
   	         <li><a href="/signup.php">회원가입</a></li>
   	         <li><a href="/mypage.php">마이페이지</a></li>
             <li><a href="/request.php">고객센터</a></li>
   	      </ul>
   	      <a id="pull" href="#">Menu</a>
   	  </nav>
   	  <br />
   	  <div class="container-fluid col-lg-8 col-lg-offset-2">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">작성하기</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                		<div class="panel panel-default">
                			    <div class="panel-heading">
                            		
                        		</div>
                        		<div class="panel-body">
                        			<form >
                        			<div class="row">
                        				<div class="col-lg-8 col-lg-offset-2">
                        					<div class="form-group">
	                                            <label>제목</label>
	                                            <input class="form-control" id="title" name="title" maxlength="255" type="text">
	                                        </div>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<hr>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-8 col-lg-offset-2">
                        				<div class="form-group">
                        				<lable>내용</lable>
                        				<textarea class="form-control" id="contents" name="contents" rows="30" ></textarea>
                        				</div>
                        				</div>
                        			</div>
                        			<br />
                                    <br />
                                    <div class="row">
                                    	<div class="col-lg-6 col-lg-offset-2">
											<input class="btn btn-success" type="button" id="write" value="작성하기">
											<input class="btn btn-warning" type="button" id="back" value="돌아가기">
                                    	</div>
                                    </div>
                                    </form>
                        		</div>
                		</div>
                	</div>
                </div>
            </div>
	    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
		$('#back').on('click' , function(){
			location.href="board.php"
			});

    	$('#write').on('click' , function(){
    		if($("#title").val().trim().length==0){
				alert("제목을 입력해 주세요");
    		} else if($("#contents").val().trim().length==0){
    			alert("내용을 입력해 주세요");
    		} else{
    			 $.post("board-reg.php",
    		 	         {
    		 	        	 title: $("#title").val().trim(),
    		 	             contents : $("#contents").val().trim()
    		 	         },
    		 	         function(result) {
    		 	           if(result=='true'){
    		 	             alert("작성이 완료되었습니다.");
    		 	             location.replace('board.php');
    		 	           }else{
    		 	             alert(result);
    		 	           }

    		 	         }
    		 	       );
    							
    		}
            		
    	});
    });
    </script>
     </body>
</html>
