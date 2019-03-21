<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>이화투어</title>
      <link rel="stylesheet" href="css/selectpackage.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
       <script src="https://use.fontawesome.com/6bf7149e9c.js"></script> <!-- datapicker 위해 넣음(CSS라서 위에) -->
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
     <form action="" name="f">
       <header style="padding:10px;">

           <a href="http://ewhatour.ivyro.net/index.php"><center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>


       </header>
       <div>

     </div>
   	  <nav class="clearfix">
   	      <ul class="clearfix">
   	         <li><a href="http://ewhatour.ivyro.net/login.php">로그인</a></li>
   	         <li><a href="http://ewhatour.ivyro.net/signup.php">회원가입</a></li>
   	         <li><a href="http://ewhatour.ivyro.net/mypage.php">마이페이지</a></li>
              <li><a href="http://ewhatour.ivyro.net/request.php">고객센터</a></li>

   	      </ul>
   	      <a id="pull" href="#">Menu</a>

   	  </nav>




        <center><div class="" style="padding:10px;">

        <table style="width:80%;margin:auto;text-align:center;align-content:center;" border="1" class="table table-striped table-bordered table-hover">
          <colgroup>
            <col width="70px">
            <col width="">
            <col width="70px">
            <col width="">
            <col width="70px">
            <col width="">
          </colgroup>
          <tbody>
            <tr>
              <td style="width:10%;"><label>번호</label></td>
              <td style="width:10%;">
        <select name="pop_skin" id="pop_skin" style="height: 30px; width: 100px;margin-right:30px;">
          <option value="0" selected>국가</option> <!-- 조회 선택 안된 경우 -->


      <?php
      include 'DAO.php';
      $cid = mysqli_real_escape_string($con, $_GET['CID']);
      $sql = "SELECT Country_name, CNID FROM countryname WHERE CID='$cid'";
      $ret = mysqli_query($con,$sql) or die(mysql_error());
      $numrow = mysqli_num_rows($ret);
      while($row = mysqli_fetch_array($ret))
		{
			echo ("<option value=$row[CNID]> $row[Country_name]</option>"); // country_name마다 CNID의 value 하나씩 넣기
		}
      mysqli_close($con);
      ?>
    </select></td>
        <td style="width:5%;">
        <select name="" id="theme" style="height: 30px; width: 100px; margin-right:30px;">
          <option value="0" selected>테마</option> <!-- 조회 선택 안된 경우 -->
          <option value="가족여행">가족여행</option>
          <option value="혼자여행">혼자여행</option>
          <option value="배낭여행">배낭여행</option>
          <option value="허니문">허니문</option>
          <option value="크루즈">크루즈</option>
        </select></td>
        <td style="width:10%;">
        <select name="" id="room_grade" style="height: 30px; width: 100px;  margin-right:30px;">
          <option value="0" selected>숙박등급</option> <!-- 조회 선택 안된 경우 -->

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
        </td>
        <td style="width:35%;"><label>출발일</label>
        <div class="form-group date">
              <label for="date" class="control-label"></label>
              <div class="input-group date" id="datepicker-container" >
              							<input type="text" class="form-control" id="date"
              							placeholder="" readonly name="birth_date" style="height: 33px; width: 100px;"/>
              							<span class="input-group-btn" id="basic-addon1">
              							<button class="btn btn-default" type="button">
              							<i class="fa fa-calendar-o"></i> <!-- fontawesome-->
              							</button>
              							</span>
              	</div>
          </div>
        </td>

      <td style="width:40%;"><label style="height: 30px; width: 500px; padding:10px;">상품명</label></td>

    <td style="width:5%;"><input type="button" id=search class="btn btn-primary" value="조회"></input></td></table>
      </input>
    </div></center>

<center><div>
<table style="width:80%; text-align:center;" border=’1′ class="table table-striped table-bordered table-hover">
  <tr> <th style="text-align:center;height: 30px; width: 5%;  margin-right:30px;">번호</th>
  <th style="text-align:center;height: 30px; width: 15%;  margin-right:30px;">국가</th>
  <th style="text-align:center;height: 30px; width: 10%;  margin-right:30px;">테마</th>
  <th style="text-align:center;height: 30px; width: 10%;  margin-right:30px;">숙박등급</th>
  <th style="text-align:center;height: 30px; width: 10%;  margin-right:30px;">출발일</th>
  <th style="text-align:center;height: 30px; width: 60%; padding:10px;">상품명</th></tr>
<tbody id ="result_table">
</tbody>
</table>
</div></center>

       </form>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jquery 사용을 위해 넣음 -->
    <script src="js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.js"></script> <!-- datapicker 위해 넣음 -->
    <script src="/js/bootstrap-datepicker.js" type="text/javascript"></script> <!-- datapicker 위해 넣음 -->
	<script type="text/javascript"> // jquery. 조회(search) 버튼 클릭 됐을 때
    $('.input-group.date').datepicker({ //datepicker 처리내용
        container: '#datepicker-container',
        startDate: '0d',
        orientation: "bottom right",
          startView: 0,
          autoclose: true,
          format: 'yyyy-mm-dd',
          defaultDate: new Date(),
          todayHighlight: true
      });


	  $("#search").on('click', function(){

	    if($("#pop_skin option:selected").val()=="0"){ //국가 선택 안했을시 쿼리 못날리게 막아놓음

	      alert("국가를 선택해주세요.");
	    }else{

	      $.get(   //조회조건으로 get요청
	        "reqSelect.php",
	        {
	            cnid : $("#pop_skin option:selected").val(),
				theme : $("#theme option:selected").val(),
				room_grade : $("#room_grade option:selected").val(),
				date : $("#date").val()
	        },
	        function(result) {
		        $("#result_table").text("");  //결과테이블 reset
				for(var i =0 ; i < result.length; i++){   //결과 갯수만큼 table생성
					var date = result[i]['Departure'].split(" ");
					$("#result_table").append("<tr><td>"+(i+1)+"</td><td>"+result[i]['Detail_name']+"</td><td>"+result[i]['Theme']+"</td><td>"+result[i]['RoomType']+"</td><td>"+date[0]+"</td><td>"+result[i]['Product']+"<input type='button' value='상세보기' style='margin:5px;float:right;' class='btn btn-success' onclick='goPackage("+result[i]['PID']+")'></input></td></tr>");
				}
      },"json" //결과값을 json으로 받겠다는 옵션
	      );
	    }
	  });
    function goPackage(PID){

      location.href="detail_pages/detail_package.php?PID="+PID;
    }
	</script>
</body>
</html>
