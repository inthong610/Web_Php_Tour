
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>이화투어</title>
      <link rel="stylesheet" href="css/login.css">
      <link href="http://ewhatour.ivyro.net/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form align-items:center method="post" action="">
  <header>

    <div class="imgcontainer">
      <a href="http://ewhatour.ivyro.net"<center><img src="http://imageshack.com/a/img922/8682/OpuU53.png" height=100px width=350px ></center></a>
    </div>
  </header>
 <input type="text" class="textform" placeholder="ID" name="id" id="id" style="margin-bottom: 50px"/>
<input type="password" class="textform"  placeholder="Password" id="pwd" name="pwd" style="margin-bottom: 20px"/>  <div style="float:left; width:50%; height:60px;">
  <input type="button" class="btn1" onclick="location.href='http://ewhatour.ivyro.net/signup.php'" value="회원가입"/></div>
<div style="float:left; width:50%; height:60px;"><input type="button" id="signInBtn" class="btn2" value="로그인"/></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jquery 사용을 위해 넣음 -->

</body>




<script>



  $(document).ready(function(){ // html 문서가 다 로딩되었을 때 아래 내용 실행
  $('#signInBtn').on('click' , function(){

    $.post(
      "checkLogin.php",
      {
          id: $("#id").val(),
          pwd : $("#pwd").val(),
      },
      function(result) {

        if(result=='true'){
          alert("로그인 되었습니다.");
          location.replace('index.php');
        }else{
          alert("아이디 혹은 비밀번호를 다시 한번 확인해주세요.");
        }


  });
 });
 });





</script>




</html>
