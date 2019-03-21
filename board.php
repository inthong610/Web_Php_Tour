

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
           <a href="/index.php"<center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>
         	
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
   	  <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            	board &nbsp;&nbsp;<button class='btn btn-success btn-sm' id="write_board" type='button' >작성하기</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                            			    <!--<th>no</th>  -->        
                                        <th>작성자</th>
                                        <th>제목</th>
                                        <th>작성 시간</th>
                                        <th>자세히</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	include 'DAO.php';
                                	$sql = "select  member.name,a.time,a.reply_num ,a.title, a.bid from (select * from board) as a , member WHERE a.mid = member.mid ORDER BY a.time DESC;"; // 모든 memeber 정보 출력
                                	$ret = mysqli_query($con,$sql) or die(mysql_error());
                                	while($row = mysqli_fetch_array($ret))
                                	{  
                                		echo ("<tr><td>$row[name]</td><td>$row[title]"." [$row[reply_num]"."]</td><td>$row[time]</td><td><button class='btn btn-default btn-xs' type='button' onClick='show_detail($row[bid])'>보 기</button></td>");
                                	//	<td>$row[bid]</td>
                                	}
                                	mysqli_close($con);
                                	?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
            responsive: true,
            "ordering": false
        });
		$('#write_board').on('click' , function(){
			<?php 
			session_start();
			if(isset($_SESSION['user_mid'])){ //세션변수 user_mid 존재하느냐 안하느냐 확인하는 변수(isset)
			?>
			location.href="board-write.php"<?php 
			} else{
			?>
			alert("로그인 후에 작성 가능합니다.");
			<?php }?>
			});
    });
    function show_detail(bid){
		location.href="board-show.php?bid="+bid;
	}
    </script>
     </body>
</html>
