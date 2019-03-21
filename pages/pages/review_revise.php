<!DOCTYPE html>
<html lang="en">

<head>
	<?php
			include '../DAO.php';
        	session_start();
           	if(!isset($_SESSION['aid'])){ //세션변수 aid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
           		header('Location: ../admin_login.html');
           	} // 해당 pid에 대한 패키지 리뷰 정보 불러오기
           	$sqlQuery = "select member.Name, member.ID, package.Product , package.Departure , a.Rate,a.RID , a.Comment from member, package,(select * from review WHERE rid = $_GET[rid]) as a WHERE a.mid = member.MID AND a.pid = package.PID;";
			$ret = mysqli_query($con,$sqlQuery) or die(mysql_error());
           	$row = mysqli_fetch_array($ret);
           	$ID = $row['ID'];
           	$name = $row['Name'];
           	$product = $row['Product'];
           	$departure = substr("".$row['Departure'] , 0 ,10);
           	$rid =  $row['RID'];
           	$rate = $row['Rate'];
           	$comment = $row['Comment'];
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
                        <h1 class="page-header">리뷰 정보 수정</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                		<div class="panel panel-default">
                			    <div class="panel-heading">
                            		revise Resrve
                        		</div>
                        		<div class="panel-body">
                        			<form action="../review-revise.php" method="post" >
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<h2>리뷰 정보</h2>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<h4>작성자 : <?=$name?></h4>
                        				</div>
                        				<div class="col-lg-6">
                        					<h4>작성자 ID : <?=$ID?></h4>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<h4>상품명 : <?=$product?></h4>
                        				</div>
                        				<div class="col-lg-6">
                        					<h4>출발일 : <?=$departure?></h4>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<hr>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
	                        				<div class="form-group">
	                                            <label>내용</label>
	                                            <input type="text" class="form-control" name="comment" value="<?=$comment?>">
	                                        </div>
	                                     </div>
	                                     <div class="col-lg-2">
	                                     	<div class="form-group">
	                                            <h4>평점 : <?=$rate?></h4>
	                                        </div>
	                                     </div>
                        			</div>
                                    <div class="row">
                                    	<div class="col-lg-6">
											<input class="btn btn-success" type="submit" value="revise">
											<input class="btn btn-warning" type="button" id="review_delete" value="delete">
                                    	</div>
                                    </div>
                                    	<input  type="hidden" value="<?=$rid?>" id="rid_hidden" name="rid"> <!-- 현재 pid 저장 변수 -->
                                    </form>
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
        </script>
</body>

</html>
