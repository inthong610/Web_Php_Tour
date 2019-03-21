<!DOCTYPE html>
<html lang="en">

<head>
	<?php	
			include '../DAO.php';
        	session_start();
           	if(!isset($_SESSION['aid'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
           		header('Location: ../admin_login.html');
           	} // 해당 pid에 대한 패키지 정보 불러오기
           	$sqlQuery = " select * from (select package.Theme, package.RoomType, package.Departure, package.Product, package.Cost, detailcountry.Detail_name from package , detailcountry WHERE pid = $_GET[pid] and package.dcid = detailcountry.dcid) as a, (select Rid, Name, Birth, Phone, Email, AdultNum , ChildNum, BabyNum, Request from reserve where rid= $_GET[rid]) as b;";
			$ret = mysqli_query($con,$sqlQuery) or die(mysql_error());
           	$row = mysqli_fetch_array($ret);
           	$theme = $row['Theme'];
           	$roomType = $row['RoomType'];
           	$departure = substr("".$row['Departure'] , 0 ,10);
           	$country =  $row['Detail_name'];
           	$cost = $row['Cost'];
           	$product = $row['Product'];
           	$name = $row['Name'];
            $birth = $row['Birth'];
            $phone = "$row[Phone]";
            $email = $row['Email'];
            $adultNum = $row['AdultNum'];
            $childNum = $row['ChildNum'];
            $babyNum = $row['BabyNum'];
            $request = $row['Request'];
            $rid = $row['Rid'];
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
                        <h1 class="page-header">예약정보 수정</h1>
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
                        			<form action="../reserve-revise.php" method="post" >
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<h2>패키지 정보</h2>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<h4>테마 : <?=$theme?></h4>
                        				</div>
                        				<div class="col-lg-6">
                        					<h4>객실 등급 : <?=$roomType ?></h4>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<h4>출발일 : <?=$departure?></h4>
                        				</div>
                        				<div class="col-lg-6">
                        					<h4>상품명 : <?=$product ?></h4>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<h4>가격 : <?=$cost?></h4>
                        				</div>
                        				<div class="col-lg-6">
                        					<h4>국가 : <?=$country?></h4>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<hr>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-12">
                        					<h2>예약 정보</h2>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-2">
	                        				<div class="form-group">
	                                            <label>예약자</label>
	                                            <input type="text" class="form-control" name="name" value="<?=$name?>">
	                                        </div>
	                                        </div>
	                                        <div class="col-lg-2">
	                                        <div class="form-group">
	                                            <label>phone</label>
	                                            <input type="text" class="form-control" name="phone" value="<?=$phone?>">
	                                        </div>
                                        </div>
                                        <div class="col-lg-2">
	                        				<div class="form-group">
	                                            <label>Email</label>
	                                            <input type="text" class="form-control" name="email" value="<?=$email?>">
	                                        </div>
	                                        </div>
	                                        <div class="col-lg-2">
		                        				<div class="form-group">
		                        				<label>Birth</label>
									                <div class='input-group date' id='datetimepicker1'>
									                    <input type='text' class="form-control" name="birth" value="<?=$birth?>" readonly/>
									                    <span class="input-group-addon">
									                        <span class="glyphicon glyphicon-calendar"></span>
									                    </span>
									                </div>
	            								</div>
	                                        </div>
                        			</div>
                        			<br />
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<div class="form-group">
	                                            <label>요청 사항</label>
	                                            <input class="form-control" value="<?=$request?>"  name="request" maxlength="99" type="text">
	                                        </div>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-2">
                        					<div class="form-group">
	                                            <label>성 인</label>
	                                            <input class="form-control" value="<?=$adultNum?>"  name="adult_num" type="number">
	                                        </div>
                        				</div>
                        				<div class="col-lg-2">
                        					<div class="form-group">
	                                            <label>소 인</label>
	                                            <input class="form-control" value="<?=$childNum?>"  name="child_num" type="number">
	                                        </div>
                        				</div>
                        				<div class="col-lg-2">
                        					<div class="form-group">
	                                            <label>유 아</label>
	                                            <input class="form-control" value="<?=$babyNum?>"  name="baby_num" type="number">
	                                        </div>
                        				</div>
                        			</div>
                                    <br />
                                    <div class="row">
                                    	<div class="col-lg-6">
											<input class="btn btn-success" type="submit" value="revise">
											<input class="btn btn-warning" type="button" id="reserve_delete" value="delete">
                                    	</div>
                                    </div>
                                    	<input  type="hidden" value="<?=$rid?>" id="pid_hidden" name="rid"> <!-- 현재 pid 저장 변수 -->  
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
                    format: 'yyyy-mm-dd'
                    });
            });
            $("#reserve_delete").on('click', function(){
                	location.href="../reserve-del.php?rid=<?=$rid?>"
                });
        </script>
</body>

</html>
