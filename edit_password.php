<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>비밀번호 변경</title>
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body style="background:#d9d9d9;">

    <form style="float:middle;" method="post" action="edit_pwd.php">
    <center> <h4><label>회원 비밀번호 변경</label></h4></center><br></br>
    <center><br>현재 비밀번호</br></center>
    <center><div>
    <input type="password" name="pwd1"></input>
</div></center>
  <center><br>신규 비밀번호</br></center>
  <center><div>
  <input type="password" name="pwd2"></input>
</input></div></center>
<center><br>비밀번호 재입력</br></center>
<center><div>
<input type="password" name="pwd3"></input>
</input></div></center>
<br></br>
<center>
  <div style="padding-top:10px;"><input type="submit" value="확인" class="btn btn-primary"></input>
<input type="button" value="취소" onclick="Sub()" class="btn btn-danger"></input></div></center>

<script>

function Sub(){
window.opener.top.location.href="edit_mypage.php";
//window.opener.top.location.reload();//새로고침
window.close()
}
</script>
</form>
  </body>
</html>
