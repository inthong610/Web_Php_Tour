
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
    <link rel="stylesheet" href="/css/bootstrap-datepicker3.css">
   <script src="https://use.fontawesome.com/6bf7149e9c.js"></script> <!-- datapicker 위해 넣음(CSS라서 위에) -->


  </head>
  <body>
      <form>

        <div class="col-md-6 col-md-offset-3" >
          <header>
            <div class="imgcontainer">
              <a href="http://ewhatour.ivyro.net"<center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>
            </div>
          </header>
          <label for="Name">이름</label>
          <div class="form-group">
            <div style="float:left;" class="">
            <input type="text" class="form-control" id=name name=name placeholder="2-5자 입력" />
          </div></div>
            <div class="form-group" style="padding-top: 40px">
              <label for="InputId">아이디</label>
                  <div class="form-group">
                    <div style="float:left;" class=""> <!-- input 태그 name은 포스트 넘길 때 파라미터 이름, id는 jquery와 css에서 #이 붙은 문자열, class는 jquery와 css에서 .붙은 것 의미 -->
                    <input type="text" id="chk_id1" class="form-control" name=id placeholder="숫자, 영문자 6-20자 입력"/> <!-- chk_id1은 적은 id 불어옴 -->
                   <input type="hidden" id="chk_id2" name=chk_id2 value="0"> <!-- hidden은 화면에 안 보이는 input. value가 0일 때는 체크가 안된 것으로 하기로 함 -->

                  </div>
                  <div>
                    <input type="button"  class="btn" onclick=chid() value="중복확인" style="vertical-align: middle; width:100px; margin-left: 15px; background-color: #597ba9; color: white;"/>
                  </div>
                  </div>
            <div class="form-group" style="padding-top: 20px">
              <label for="InputPassword1">비밀번호</label>
              <input type="password" class="form-control" name=pwd1 id="Password" placeholder="숫자, 영문, 특수문자 만 사용할수 있으며 6-15자 입력">
            </div>
            <div class="form-group" style="padding-top: 20px">
              <label for="InputPassword2" >비밀번호 확인</label>
              <input type="password" class="form-control" name=pwd2 id="Password2" placeholder="비밀번호 재확인">
              <p class="help-block">비밀번호 확인을 위해 다시 한번 입력해주세요.</p>
            </div>
            <div class="form-group date" id="datepicker-container" style="padding-top: 20px">
              <label for="username">생년월일</label>
              <div class="input-group date" >
              							<input type="text" class="form-control" id="Birth"
              							placeholder="" readonly name="birth_date"/>
              							<span class="input-group-btn" id="basic-addon1">
              							<button class="btn btn-default" type="button">
              							<i class="fa fa-calendar-o"></i> <!-- fontawesome-->
              							</button></span>
              						</div>
              						</div>
            <div class="form-group" style="padding-top: 20px">
              <label for="username">전화번호</label>
              <input type="text" name="phone" class="form-control" id="Phone" placeholder="'-'없이 10-11자리 전화번호 입력">
            </div>
            <div class="form-group" style="padding-top: 20px">
              <label for="username">E-mail</label>
              <input type="email" name="email" class="form-control" id="Email" placeholder="@를 포함한 올바른 이메일 주소 입력">
            </div>
            <div class="form-group text-center" style="padding-top: 20px"> <!-- history.back()은 캐쉬 볼 수 있어서 index.php로 -->
              <button type="button" class="btn" onclick="location.href='http://ewhatour.ivyro.net/index.php'" style="background-color:#597ba9;">홈으로<i class="fa fa-times spaceLeft"></i></button>
              <button type="button" class="btn" id="signUpBtn" style="background-color:#597ba9;">회원가입<i class="fa fa-check spaceLeft"></i></button>
            </div>
        </div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jquery 사용을 위해 넣음 -->
    <script src="js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.js"></script> <!-- datapicker 위해 넣음 -->
    <script src="/js/bootstrap-datepicker.js" type="text/javascript"></script> <!-- datapicker 위해 넣음 -->
    <script>


     function chid(){


     var idRegExp =  /[a-z]|[0-9]/gi;    // 정규식


      var id= $("#chk_id1").val() // jquery .이면 클래스 #이면 id -> chk_id1 입력을 감지
                                  // chk_id1이라는 id를 가진 input의 value를 id에 넣은 것

      if(id==""){
      alert("아이디를 입력해주세요.");

      exit;
    }else if((($("#chk_id1").val()).replace(idRegExp , ''))!=''||$("#chk_id1").val().length<6 ||$("#chk_id1").val().length>20){
       alert("아이디는  숫자와 영문자를 포함한 6자리 이상 20자리 이하만 사용가능합니다.");
     }

    else{
      // jquery
      $.post( // 빈칸이 아니면 check_id.php에 post 요청
        "check_id.php",{
          id : id // id라는 parameter에 id 값을 넣은 것(왼-파라미터, 오-위에서 지정한 값)
        },
        function(data){ // check_id.php에 있는 echo 값이 data로 넘어옴

          if(data=='true'){

            $("#chk_id2").val(1); // 체크했는데 이미 사용중이면 0 그대로, 아니면 1로 바꾼다.
            alert("사용 가능한 아이디입니다.");
            $("#chk_id1").attr("disabled",true);


          }else if(data=='false'){
            alert("이미 사용중인 아이디입니다.");

          }else{
            alert(data); // data alert로 보여줌
          }

        }

      )

    }



     }

     $('.input-group.date').datepicker({
      container: '#datepicker-container',
      endDate: "0d",
      orientation: "bottom right",
        startView: 2,
        autoclose: true,
        format: 'yyyy-mm-dd',
        defaultViewDate: { year: 1995, month: 06, day: 10 }
    });

    $(document).ready(function(){ // html 문서가 다 로딩되었을 때 아래 내용 실행
    $('#signUpBtn').on('click' , function(){


     // 정규식
     var idRegExp =  /[a-z]|[0-9]/gi;
     var passRegExp = /^[a-zA-Z0-9!@#$%^&*()?_~]{6,15}$/;
     var nameRegExp = /^[\uac00-\ud7a3]{2,5}$/;
     var phoneRegExp= /^01([0|1|6|7|8|9])([0-9]{7,8})$/g;
     var emailRegExp = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;



     if((($("#chk_id1").val()).replace(idRegExp , ''))!=''||$("#chk_id1").val().length<6 ||$("#chk_id1").val().length>20){
       alert("아이디는  숫자와 영문자를 포함한 6자리 이상 20자리 이하만 사용가능합니다.");
     }else if($("#chk_id2").val()==0){
       alert("아이디 중복 확인을 해주세요.");

     }
      else if(!($("#Password").val()==$("#Password2").val())){
       alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
     } else if(!passRegExp.test($("#Password").val())){
       $("#reg-modal-title").text("비밀번호 오류");
       alert("비밀번호는 숫자, 영문, 특수문자 만 사용할수 있으며 6~15자리를 사용해야 합니다.");
     } else if(!nameRegExp.test($("#name").val())){
       alert("올바른 이름을 입력해 주세요.");
     } else if(!$("#Birth").val()){
       alert("생년월일을 선택해 주세요.");
     } else if(!phoneRegExp.test($("#Phone").val())){
       alert("올바른 휴대폰 번호를 입력해 주세요.");
     } else if(!emailRegExp.test($("#Email").val())){
       alert("올바른 이메일을 입력해 주세요.");


     }  else{
       $.post(
         "reqSignup.php",
         {
             id: $("#chk_id1").val(),
             pw1 : $("#Password").val(),
             pw2 : $("#Password2").val(),
             name : $("#name").val(),
             email : $("#Email").val(),
             phone :$("#Phone").val(),
             birth :$("#Birth").val(),
         },
         function(result) {
           if(result=='true'){
             alert("회원가입이 완료되었습니다.");
             location.replace('index.php');
           }else{
             alert("회원가입이 실패했습니다.");
           }

         }
       );
     }
    });
    });



    </script>


  </form>
  </body>
</html>
