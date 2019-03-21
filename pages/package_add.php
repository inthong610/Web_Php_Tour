<!DOCTYPE html>
<html lang="en">

<head>
	<?php
        	session_start();
           	if(!isset($_SESSION['aid'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
           		header('Location: ../admin_login.html');
           	}
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
                        <h1 class="page-header">패키지 등록</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                		<div class="panel panel-default">
                			    <div class="panel-heading">
                            		new Package
                        		</div>
                        		<div class="panel-body">
                        			<form action="../package-reg.php" method="post" enctype="multipart/form-data">
                        			<div class="row">
                        				<div class="col-lg-2">
	                        				<div class="form-group">
	                                            <label>Theme</label>
	                                            <select class="form-control" name="theme">
	                                                <option value="가족여행">가족여행</option>
	                                                <option value="허니문">허니문</option>
	                                                <option value="배낭여행">배낭여행</option>
	                                                <option value="혼자여행">혼자여행</option>
	                                                <option value="크루즈">크루즈</option>
	                                            </select>
	                                        </div>
	                                        </div>
	                                        <div class="col-lg-2">
	                                        <div class="form-group">
	                                            <label>country</label>
	                                            <select class="form-control" name="country">
	                                                <?php
	                                                include '../DAO.php'; // detailcountry tabled에서 나라 목록 불러옴(DCID, Detail_name)
	                                                $sql = "select `DCID` , `Detail_name` from detailcountry;";
	                                                $ret = mysqli_query($con,$sql) or die(mysql_error());
	                                                while($row = mysqli_fetch_array($ret))
	                                                {
	                                                	echo ("<option value=$row[DCID]>$row[Detail_name]</option>"); // 옵션바
	                                                }
	                                                mysqli_close($con);
	                                                ?>
	                                            </select>
	                                        </div>
                                        </div>
                                        <div class="col-lg-2">
	                        				<div class="form-group">
	                                            <label>RoomType</label> <!-- 숙소 등급 -->
	                                            <select class="form-control" name="roomType">
	                                                <option value="1">1</option>
	                                                <option value="1.5">1.5</option>
	                                                <option value="2">2</option>
	                                                <option value="2.5">2.5</option>
	                                                <option value="3">3</option>
	                                                <option value="3.5">3.5</option>
	                                                <option value="4">4</option>
	                                                <option value="4.5">4.5</option>
	                                                <option value="5">5</option>
	                                            </select>
	                                        </div>
	                                        </div>
	                                        <div class="col-lg-2">
		                        				<div class="form-group">
		                        				<label>Departure date</label>
									                <div class='input-group date' id='datetimepicker1'>
									                    <input type='text' class="form-control" name="departure" readonly/>
									                    <span class="input-group-addon">
									                        <span class="glyphicon glyphicon-calendar"></span>
									                    </span>
									                </div>
	            								</div>
	                                        </div>
	                                        <div class="col-lg-4">
	                        				<div class="form-group">
	                                            <label>Cost</label>
	                                            <input class="form-control" type="number" name="cost">
	                                        </div>
	                                        </div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<div class="form-group">
	                                            <label>Product</label>
	                                            <input class="form-control" name="product">
	                                        </div>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
	                        				<div class="form-group">
	                                            <label>Schedule</label>
	                                            <textarea class="form-control" rows="10" name="schedule"></textarea>
	                                        </div>
                                        </div>
                                        <div class="col-lg-6">
	                        				<div class="form-group">
	                                            <label>Info</label>
	                                            <textarea class="form-control" rows="10" name="info"></textarea>
	                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-6">
	                                    	<div class="form-group">
	                                            <label>Spot image</label>
	                                            <input type="file" name="userfile[]" accept="image/*">
	                                        </div>
                                        </div>
                                        <div class="col-lg-6">
	                                    	<div class="form-group">
	                                            <label>Hotel image</label>
	                                            <input type="file" name="userfile[]" accept="image/*">
	                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-6">
											<input class="btn btn-success" type="submit" value="register">
                                    	</div>
                                    </div>
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
            $(function () {
                $('#datetimepicker1').datepicker({ // 달력
                	startView: 0,
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    startDate: '1d'
                    });
            });
        </script>
</body>

</html>
