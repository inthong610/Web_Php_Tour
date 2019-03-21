<!DOCTYPE html>
<html>
   <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>이화투어</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/edit_mypage.css" rel="stylesheet">

  </head>
  <body>


    <form>
      <header>

        <div class="imgcontainer">
          <a href="http://ewhatour.ivyro.net"<center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>
        </div>
      </header>

       <?php
       include ('DAO.php');
       session_start();
    ?>
    <hr>
    <h3>회원정보</h3>
  <div class="col-md-6 col-md-offset-3" style="float:left;" >
        <label style="float:left;" for="Name">이름</label>
         <div class="form-group">
           <div style="float:left;" class="">
           <input type="text" class="form-control" id=name name=name value="<?=$_SESSION['user_name'];?>" />
         </div></div>
           <div class="form-group" style="padding-top: 40px">
             <label style="float:left;" for="InputId">아이디</label>
                 <div class="form-group">
                   <div style="float:left;" class=""> <!-- input 태그 name은 포스트 넘길 때 파라미터 이름, id는 jquery와 css에서 #이 붙은 문자열, class는 jquery와 css에서 .붙은 것 의미 -->
                     <?php
                     $m=$_SESSION['user_mid'];
                     $sql = "select id from member where mid='$m';";
                     $ret = mysqli_query($con, $sql);
                     $row = mysqli_fetch_array($ret);
                     echo ("<input type=\"text\" id=\"chk_id1\" class=\"form-control\" style='float:left;width:62%;' name='id' value=$row[0]></input>");
                      ?>
                  <input type="hidden" id="chk_id2" name=chk_id2 value="0"> <!-- hidden은 화면에 안 보이는 input. value가 0일 때는 체크가 안된 것으로 하기로 함 -->

                   <input type="button"  class="btn" onclick=chid() value="중복확인" style="vertical-align: middle; background-color: #597ba9; color: white; width:35%; float:right;"/>
                 </div>
                 </div>
                 <div class="form-group" style="padding-top: 20px">
                   <label style="float:left;" for="InputPassword1">비밀번호</label>
                   <div style="float:left;" class="">
                   <?php
                   $sql2 = "select PW from member where mid='$m';";
                   $ret2 = mysqli_query($con, $sql2);
                   $row2 = mysqli_fetch_array($ret2);
                   echo("<input type=\"password\" class='form-control' name=pwd1 id='Password' style='float:left;width:45%;' value=$row2[0] disabled></input>");
                   ?>
                   <input type="button" onclick="window.open('edit_password.php','비밀번호 수정','top=200,left=400,width=500, height=400')" class="btn" value="비밀번호 변경" style="vertical-align: middle; background-color: #597ba9; color: white; float:right;"/>
                 </div>
                 </div>
           <div class="form-group date" id="datepicker-container" style="padding-top: 20px">
             <label style="float:left;" for="username">생년월일</label>
              <input type="text" name="phone" class="form-control" value="<?=$_SESSION['user_birth'];?>" disabled>
             </div>
           <div class="form-group" style="padding-top: 20px">
             <label style="float:left;" for="username">전화번호</label>
             <input type="text" name="phone" class="form-control" id="Phone" value="<?=$_SESSION['user_phone'];?>">
           </div>
           <div class="form-group" style="padding-top: 20px">
             <label style="float:left;" for="username">E-mail</label>
             <input type="email" name="email" class="form-control" id="Email" value="<?=$_SESSION['user_email'];?>">
           </div>
           <div class="form-group text-center" style="padding-top: 20px"> <!-- history.back()은 캐쉬 볼 수 있어서 index.php로 -->
             <button type="button" class="btn btn-success" id="signUpBtn">수정완료<i class="fa fa-times spaceLeft"></i></button>
             <button type="button" class="btn btn-danger" onclick="location.href='./mypage.php'">수정취소<i class="fa fa-times spaceLeft"></i></button>
           </div>
       </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jquery 사용을 위해 넣음 -->
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
    } else {
          $.post( // 빈칸이 아니면 check_id.php에 post 요청
          "edit_check_id.php",{
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
    $(document).ready(function(){ // html 문서가 다 로딩되었을 때 아래 내용 실행
    $('#signUpBtn').on('click' , function(){
     // 정규식
     var idRegExp =  /[a-z]|[0-9]/gi;
     var passRegExp = /^[a-zA-Z0-9!@#$%^&*()?_~]{6,15}$/;
     var nameRegExp = /^[\uac00-\ud7a3]{2,5}$/;
     var phoneRegExp= /^01([0|1|6|7|8|9])([0-9]{7,8})$/g;
     var emailRegExp = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

     var myvar = <?php echo json_encode($row[0]); ?>;

     if((($("#chk_id1").val()).replace(idRegExp , ''))!=''||$("#chk_id1").val().length<6 ||$("#chk_id1").val().length>20){
       alert("아이디는  숫자와 영문자를 포함한 6자리 이상 20자리 이하만 사용가능합니다.");
     } else if(!nameRegExp.test($("#name").val())){
      alert("올바른 이름을 입력해 주세요.");
    }  else if(!phoneRegExp.test($("#Phone").val())){
      alert("올바른 휴대폰 번호를 입력해 주세요.");
    } else if(!emailRegExp.test($("#Email").val())){
      alert("올바른 이메일을 입력해 주세요.");
    }  else{
     // jquery
     $.post(
       "edit_Signup.php",
       {
         id: $("#chk_id1").val(),
         pw : $("#Password").val(),
         name : $("#name").val(),
         email : $("#Email").val(),
         phone :$("#Phone").val(),
       },
       function(result) {
         if(result=='true'){
           alert("정보 수정이 완료되었습니다.");
           location.replace('mypage.php');
         }else{
           alert("정보 수정에 실패했습니다.");
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
