

<!DOCTYPE html>
<html>
<head>
	<?php	
			include 'DAO.php';
        	session_start(); // 게시판 정보 보이기
           	$sqlQuery = "select  member.name, member.mid ,a.time,a.reply_num , a.contents, a.title, a.bid from (select * from board WHERE bid=$_GET[bid]) as a , member WHERE a.mid = member.mid;";
			$ret = mysqli_query($con,$sqlQuery) or die(mysql_error());
           	$row = mysqli_fetch_array($ret);
           	$bid = $row['bid'];
           	$name = $row['name'];
           	$mid = $row['mid'];
           	$time =  $row['time'];
           	$reply_num = $row['reply_num'];
           	$title = $row['title'];
           	$contents = $row['contents'];
	?>
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
                        <h1 class="page-header">게시판</h1>
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
                        			<div class="row">
                        				<div class="col-lg-8 col-lg-offset-2">
	                                            <h2><?=$title?> [<?=$reply_num?>]</h2>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-8 col-lg-offset-2 text-right">
	                                            <h4>작성시간 : <?=$time?></h4>
	                                            <h4>작성자 : <?=$name?></h4>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<hr>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-8 col-lg-offset-2">
                        				<?php 
                        				$real_contents= nl2br($contents);
                        				?>
                        				<h4><?=$real_contents?></h4>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<hr>
                        			</div>
                        			<?php 
                        			$sql = "select * from board_reply WHERE BID=$_GET[bid];";
                        			$ret = mysqli_query($con,$sql) or die(mysql_error());
                        			$number= 1;
                        			while($row = mysqli_fetch_array($ret))
                        			{
                        				echo ("<div class='row'><div class='col-lg-8 col-lg-offset-2'><h5>$number. 관리자 : $row[contents] &nbsp;&nbsp;&nbsp;&nbsp; $row[time]</h5></div></div>");
                        				++$number;
                        			}
                        			mysqli_close($con);
                        			?>
                        			
                        			<br />
                                    <br />
                                    <div class="row">
                                    	<div class="col-lg-6 col-lg-offset-2">
											<?php 
											if($_SESSION['user_mid']==$mid){ // session의 mid와 글의 mid가 일치할 경우 삭제하기, 수정하기 버튼 뜸
												if(true){?>
													<input class="btn btn-success" type="button" id="delete" value="삭제하기">
													<input class="btn btn-default" type="button" id="revise" value="수정하기">
												<?php }
											}
											?>
											<input class="btn btn-warning" type="button" id="back" value="돌아가기">
                                    	</div>
                                    </div>
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
       
		$('#back').on('click' , function(){ // 돌아가기 버튼
			location.href="board.php"
			});
		$('#revise').on('click',function(){ // 수정하기 버튼

			location.href="board-show-revise.php?bid=<?=$bid?>"
		});
		$('#delete').on('click' , function(){  // 삭제하기 버튼
			  $.post("board-del.php",
		    	         {
		    	        	 bid: <?=$bid?>,
		    	         mid : <?=$mid?>
		    	         },
		    	         function(result) {
		    	           if(result.trim()=='true'){
		    	             alert("삭제가 완료되었습니다.");
		    	             location.replace('board.php');
		    	           }else{
		    	        	   alert("삭제에 실패했습니다.");
		    	           }
		    	         }
		    	       );
			});
    });
    </script>
     </body>
</html>
