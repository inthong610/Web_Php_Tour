<!DOCTYPE html>
<html lang="en">

<head>
	<?php
			include '../DAO.php';
        	session_start();
           	if(!isset($_SESSION['aid'])){ //세션변수 aid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
           		header('Location: ../admin_login.html');
           	} // 해당 pid에 대한 패키지 정보 불러오기
           	$sqlQuery = "select * from package , packagedetail WHERE package.pid = $_GET[pid] AND packagedetail.pid=$_GET[pid];";
			$ret = mysqli_query($con,$sqlQuery) or die(mysql_error());
           	$row = mysqli_fetch_array($ret);
           	$pid = $row['PID'];
           	$spot_img = $row['spot_img'];
           	$hotel_img = $row['hotel_img'];
           	$country =  $row['DCID'];
           	$cost = $row['Cost'];
           	$theme = $row['Theme'];
           	$roomType = $row['RoomType'];
           	$product = $row['Product'];
           	$departure = substr("".$row['Departure'] , 0 ,10);
           	$info = $row['Info'];
           	$schedule = $row['Schedule'];
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
                        <h1 class="page-header">패키지 수정</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                		<div class="panel panel-default">
                			    <div class="panel-heading">
                            		revise Package
                        		</div>
                        		<div class="panel-body">
                        			<form action="../package-revise.php" method="post" enctype="multipart/form-data">
                        			<div class="row">
                        				<div class="col-lg-2">
	                        				<div class="form-group">
	                                            <label>Theme</label>
	                                            <select class="form-control" name="theme">
	                                                <option id="0" value="가족여행">가족여행</option>
	                                                <option id="1" value="허니문" >허니문</option>
	                                                <option id="2" value="배낭여행">배낭여행</option>
	                                                <option id="3" value="혼자여행">혼자여행</option>
	                                                <option id="4" value="크루즈">크루즈</option>
	                                            </select>
	                                        </div>
	                                        </div>
	                                        <div class="col-lg-2">
	                                        <div class="form-group">
	                                            <label>country</label>
	                                            <select class="form-control" name="country">
	                                                <?php
	                                                 // detailcountry table에서 나라 목록 불러옴(DCID, Detail_name) - 국가 select box에서 수정해야 할 것의 나라 선택되게
	                                                $sql = "select `DCID` , `Detail_name` from detailcountry;";
	                                                $ret = mysqli_query($con,$sql) or die(mysql_error());
	                                                while($row = mysqli_fetch_array($ret))
	                                                {
	                                                	if($row['DCID']==$country){
	                                                		echo ("<option value=$row[DCID] selected>$row[Detail_name]</option>"); // 옵션바
	                                                	} else{
	                                                		echo ("<option value=$row[DCID]>$row[Detail_name]</option>"); // 옵션바
	                                                	}
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
	                                            	<?php
	                                            		for($var = 2; $var <11 ; $var++){
	                                            			$result = $var/2;
	                                            			if($result!=$roomType){
	                                            				echo ("<option value=$result>$result</option>");
	                                            			} else{
	                                            				echo ("<option value=$result selected>$result</option>");
	                                            			}

	                                            		}
	                                            	?>
	                                            </select>
	                                        </div>
	                                        </div>
	                                        <div class="col-lg-2">
		                        				<div class="form-group">
		                        				<label>Departure date</label>
									                <div class='input-group date' id='datetimepicker1'>
									                    <input type='text' class="form-control" name="departure" value="<?=$departure?>" readonly/>
									                    <span class="input-group-addon">
									                        <span class="glyphicon glyphicon-calendar"></span>
									                    </span>
									                </div>
	            								</div>
	                                        </div>
	                                        <div class="col-lg-4">
	                        				<div class="form-group">
	                                            <label>Cost</label>
	                                            <input class="form-control" type="number" value="<?=$cost?>"  name="cost">
	                                        </div>
	                                        </div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
                        					<div class="form-group">
	                                            <label>Product</label>
	                                            <input class="form-control" value="<?=$product?>"  name="product">
	                                        </div>
                        				</div>
                        			</div>
                        			<div class="row">
                        				<div class="col-lg-6">
	                        				<div class="form-group">
	                                            <label>Schedule</label>
	                                            <textarea class="form-control" rows="10" name="schedule"><?=$schedule?></textarea>
	                                        </div>
                                        </div>
                                        <div class="col-lg-6">
	                        				<div class="form-group">
	                                            <label>Info</label>
	                                            <textarea class="form-control" rows="10" name="info"><?=$info?></textarea>
	                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-6">
	                                    	<div class="form-group">
	                                            <label>Spot image</label>
	                                            <input type="file" id="spot" name="userfile[]" accept="image/*">
	                                        </div>
                                        </div>
                                        <div class="col-lg-6">
	                                    	<div class="form-group">
	                                            <label>Hotel image</label>
	                                            <input type="file" id="hotel" name="userfile[]" accept="image/*">
	                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-6">
	                                    	<img class="img-responsive" id="spot_img" src=".<?=$spot_img?>">
                                        </div>
                                        <div class="col-lg-6">
	                                    	<img class="img-responsive" id="hotel_img" src=".<?=$hotel_img?>">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                    	<div class="col-lg-6">
											<input class="btn btn-success" type="submit" value="revise">
											<input class="btn btn-warning" type="button" id="package_delete" value="delete">
                                    	</div>
                                    </div>
                                    	<input  type="hidden" value="<?=$spot_img?>" name="pre_spot_img"> <!--  수정되기 전 이미지 경로 저장된 경로 -->
                                    	<input  type="hidden" value="<?=$hotel_img?>" name="pre_hotel_img">
                                    	<input  type="hidden" value="<?=$pid?>" id="pid_hidden" name="pid"> <!-- 현재 pid 저장 변수 -->
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
            var name ="<?=$theme?>";  // 해당하는 여행 종류 선택하게 하는 select box 코드
			switch(name){
				case "가족여행":{
					$("#0").attr("selected", "selected");
					break;
				} case "허니문":{
					$("#1").attr("selected", "selected");
					break;
				} case "배낭여행":{
					$("#2").attr("selected", "selected");
					break;
				} case "혼자여행":{
					$("#3").attr("selected", "selected");
					break;
				} case "크루즈" :{
					$("#4").attr("selected", "selected");
					break;
				}
			}
			 $('#spot').change(function(){ // spot 이미지 업로드 했을 때 사진 바꾸기 및 업로드
				 var input = this; // #spot
				var url = $(this).val(); //#spot에 들어가 있는 파일의 경로
			     var reader = new FileReader(); // 사진 파일 읽는 모듈 불러오기
			        reader.onload = function (e) { // 사진 로드 됐을 때 실행할 함수
			           $('#spot_img').attr('src', e.target.result); // 사진 바꾸기
			        }
			       reader.readAsDataURL(input.files[0]); // 사진 읽어오기
			})
			$('#hotel').change(function(){
				 var input = this;
					var url = $(this).val();
				     var reader = new FileReader();
				        reader.onload = function (e) {
				           $('#hotel_img').attr('src', e.target.result);
				        }
				       reader.readAsDataURL(input.files[0]);
			})
			$('#package_delete').on('click', function(){ // 패키지 삭제 버튼 눌렀을 때 실행
					location.href="../package-del.php?pid="+$("#pid_hidden").val();
				})
        </script>
</body>

</html>
