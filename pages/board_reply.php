<!DOCTYPE html>
<html lang="en">

<head>
	<?php	
			include '../DAO.php';
        	session_start();
           	if(!isset($_SESSION['aid'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
           		header('Location: ../admin_login.html');
           	} // 해당 pid에 대한 패키지 정보 불러오기
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>이화투어 관리자페이지</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/bootstrap-datepicker3.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ewha</a>
            </div>
            <!-- /.navbar-top-links -->
			<div class="nav navbar-top-links navbar-right">
            	<li>
            		<a class="btn btn-primary" href="../admin_logout.php">
                        	로그아웃
                    </a>
            	</li>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="member_detail.php"><i class="fa fa-dashboard fa-fw"></i> 회원 리스트</a>
                        </li>
                        <li>
                            <a href="package_detail.php"><i class="fa fa-folder-open fa-fw"></i> 패키지 리스트</a>
                        </li>
                        <li>
                            <a href="reserve_detail.php"><i class="fa fa-send-o  fa-fw"></i> 예약 리스트</a>
                        </li>
						<li>
                            <a href="review_detail.php"><i class="fa fa-pencil fa-fw"></i> 리뷰 리스트</a>
                        </li>
						<li>
                            <a href="package_add.php"><i class="fa fa-file-text fa-fw"></i> 패키지 등록하기</a>
                        </li>
                        <li>
                            <a href="board_detail.php"><i class="fa fa-question-circle fa-fw"></i> 게시판 답변하기</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">답변 달기</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-8 col-lg-offset-2">
                		<div class="panel panel-default">
                			    <div class="panel-heading">
                            		reply board
                        		</div>
                        		<div class="panel-body">
                        			<div class="row">
                        				<div class="col-lg-12">
	                                            <h2><?=$title?> [<?=$reply_num?>]</h2>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-12 text-right">
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
                        				<div class="col-lg-12">
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
                        			
                        			$bidd = mysqli_real_escape_string($con, $_GET[bid]);
                        			$sql = "select * from board_reply WHERE BID=$bidd";
                        			$ret = mysqli_query($con,$sql) or die(mysql_error());
                        			$number= 1;
                        			while($row = mysqli_fetch_array($ret))
                        			{
                        				echo ("<div class='row'><div class='col-lg-12'><h5>$number. 관리자 : $row[contents] &nbsp;&nbsp;&nbsp;&nbsp; $row[time]&nbsp;&nbsp;&nbsp;&nbsp;<input class='btn btn-warning btn-xs' type='button' id='del-reply-btn' onClick='delete_reply($row[BRID])' value='삭제'></h5></div></div>");
                        				++$number;
                        			}
                        			mysqli_close($con);
                        			?>
                                    <div class="row">
                        				<div class="col-lg-12">
                        					<hr>
                        				</div>
                        			</div>
                                    <div class="row">
                                    	<div class="col-lg-8">
                        					<div class="form-group">
	                                            <label>답변달기</label>
	                                            <input class="form-control" type="text" id="reply"  name="reply">
	                                        </div>
                                    	</div>
                                    	</div>
                                    	<div class="row">
                                    	<div class="col-lg-6">
                                    			<input class="btn btn-success" type="button" id="reply-btn" value="reply">
                                    	</div>
                        			</div>
                		</div>
                	</div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
    <script src="../js/bootstrap-datepicker.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	 <script type="text/javascript">
            $("#review_delete").on('click', function(){
                	location.href="../review-del.php?rid=<?=$rid?>"
                });
            $("#reply-btn").on('click' , function(){
                $.post(
                        "../reply-reg.php",
                        {
                            bid: <?=$bid?>,
                            contents: $("#reply").val()
                        },
                        function(result) {
                          if(result=='true'){
                            alert("답변 등록이 완료되었습니다.");
                            location.reload();
                          }else{
                            alert(result);
                          }
                        }
                      );
            })
            function delete_reply(brid){
            	$.post(
                        "../reply-del.php",
                        {
                            brid: brid,
                            bid: <?=$bid?>
                        },
                        function(result) {
                          if(result=='true'){
                            alert("답변 삭제가 완료되었습니다.");
                            location.reload();
                          }else{
                            alert(result);
                          }
                        }
                      );
            }
        </script>
</body>

</html>
