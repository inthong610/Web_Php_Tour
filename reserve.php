
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>이화투어</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/signup.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
    <link rel="stylesheet" href="css/reserve.css">
   <script src="https://use.fontawesome.com/6bf7149e9c.js"></script> <!-- datapicker 위해 넣음(CSS라서 위에) -->


  </head>
  <body>
      <form >

        <div class="col-md-6 col-md-offset-3" >
          <header>
            <div class="imgcontainer">
              <a href="/"<center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>
            </div>

          </header>
          <div>
          <center><label for="Name" style="font-size:40px; color:dark-blue;font-family:Lora;">Reservation<br></br></label></div></center>
          <label for="Name">예약자 이름</label>
          <div class="form-group">
            <div style="float:left;" class="">
            <input type="text" class="form-control" id="Name" name=name placeholder="이름" />
          </div></div>
            <div class="form-group" style="padding-top: 40px">
              <label for="InputId">인원선택</label>
                  <div class="form-group">
                    <div style="float:left;" class="" style="padding:10px;"> <!-- input 태그 name은 포스트 넘길 때 파라미터 이름, id는 jquery와 css에서 #이 붙은 문자열, class는 jquery와 css에서 .붙은 것 의미 -->
                      <select name="adult" id="adult" style="height: 30px; width: 60px;margin-right:30px;">
                        <option value="0">성인</option>
                        <option value="1">1명</option>
                        <option value="2">2명</option>
                        <option value="3">3명</option>
                        <option value="4">4명</option>
                        <option value="5">5명</option>
                      </select>


                      <select name="child" id="child" style="height: 30px; width: 90px; margin-right:30px;">
                        <option value="0">어린이</option>
                        <option value="1">1명</option>
                        <option value="2">2명</option>
                        <option value="3">3명</option>
                        <option value="4">4명</option>
                        <option value="5">5명</option>
                      </select>

                      <select name="baby"  id="baby" style="height: 30px; width: 60px;">
                        <option value="0">유아</option>
                        <option value="1">1명</option>
                        <option value="2">2명</option>
                        <option value="3">3명</option>
                        <option value="4">4명</option>
                        <option value="5">5명</option>
                      </select>
                  </div>

                  </div>
            <div class="form-group" style="padding-top: 20px">
              <label>전화번호</label>
              <input type="text" class="form-control" name=phone id="Phone" placeholder="'-' 없이 전화번호 입력">
            </div>
            <div class="form-group" style="padding-top: 20px">
              <label for="InputPassword2" >이메일</label>
              <input type="text" class="form-control" name=email id="Email" placeholder="이메일 주소">

            </div>

            <div class="form-group date" id="datepicker-container" style="padding-top: 20px">
              <label>생년월일</label>
              <div class="input-group date" >
              							<input type="text" class="form-control" id="Birth"
              							placeholder="" readonly name="birth_date"/>
              							<span class="input-group-btn" id="basic-addon1">
              							<button class="btn btn-default" type="button">
              							<i class="fa fa-calendar-o"></i> <!-- fontawesome-->
              							</button></span>
              						</div>            </div>
                          <div class="form-group" style="padding-top: 20px">
                            <label >요구 사항</label>
                            <input type="text" class="form-control" name="request" id="Request" placeholder="추가 요구 사항을 입력하세요.">
                            <p class="help-block"></p>
                          </div>
            <div class="form-group text-center" style="padding-top: 20px"> <!-- history.back()은 캐쉬 볼 수 있어서 index.php로 -->


			<?php   $pid = $_GET['PID']; ?> <!-- PID 받아와서 그 pid로 예약하기 -->

				<input type="hidden" id="Pid" value="<?=$pid?>"> 
              <button type="button" class="btn" id="reviseBtn" style="background-color:#597ba9;">예약완료<i class="fa fa-check spaceLeft"></i></button>
            </div>
        </div>  </form>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jquery 사용을 위해 넣음 -->
   <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.js"></script> <!-- datapicker 위해 넣음 -->
    <script src="/js/bootstrap-datepicker.js" type="text/javascript"></script> <!-- datapicker 위해 넣음 -->
        <script type="text/javascript">
        $('.input-group.date').datepicker({
            container: '#datepicker-container',
            endDate: "0d",
            orientation: "bottom right",
              startView: 2,
              autoclose: true,
              format: 'yyyy-mm-dd',
              defaultViewDate: { year: 1995, month: 06, day: 10 }
          });
		<?php
           	session_start();
           	if(isset($_SESSION['user_name'])){ //세션변수 user_name 존재하느냐 안하느냐 확인하는 변수(isset)
           ?>
           	$("#Name").val("<?=$_SESSION['user_name']?>");
           	$("#Phone").val("<?=$_SESSION['user_phone']?>");
           	$("#Email").val("<?=$_SESSION['user_email']?>");
           	$("#Birth").val('<?=substr($_SESSION['user_birth'] , 0 ,10)?>');
           <?php }?>
           var nameRegExp = /^[\uac00-\ud7a3]{2,5}$/;
           var phoneRegExp= /^01([0|1|6|7|8|9])([0-9]{7,8})$/;
           var emailRegExp = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

			$("#reviseBtn").on('click' , function(){
				 if(!nameRegExp.test($("#Name").val())){
				       alert("올바른 이름을 입력해 주세요.");
				     } else if(!$("#Birth").val()){
				       alert("생년월일을 선택해 주세요.");
				     }  else if(!emailRegExp.test($("#Email").val())){
				       alert("올바른 이메일을 입력해 주세요.");
				     } else if(!(phoneRegExp.test($("#Phone").val()))){
					       alert("올바른 휴대폰 번호를 입력해 주세요.");
					  } else if(($("#adult option:selected").val()=="0")&&($("#child option:selected").val()=="0")){
						  alert("인원을 정확하게 입력해 주세요!!");
					  } else{
						  $.post("reserve-reg.php", // reserve-reg로 보내기
					    	         {
					    	        	 name: $("#Name").val(),
					    	             adult : $("#adult option:selected").val(),
					    	             child : $("#child option:selected").val(),
					    	             baby : $("#baby option:selected").val(),
					    	             phone : $("#Phone").val(),
					    	             email : $("#Email").val(),
					    	             birth_date :$("#Birth").val(),
					    	             request : $("#Request").val(),
					    	             pid : $("#Pid").val()
					    	         },
					    	         function(result) {
					    	           if(result=='true'){
					    	             alert("예약이 완료되었습니다.");
					    	             location.replace('index.php');
					    	           }else{
					    	             alert("예약에 실패했습니다.");
					    	           }

					    	         }
					    	       );
					  }
			});

           </script>
  </body>
</html>
