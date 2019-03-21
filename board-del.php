

<?php // 패키지 등록 // php 이름에서 -는 서버 처리 위함, _는 html 위주
	include 'DAO.php';
	session_start();
	if(!isset($_SESSION['user_mid'])){ //세션변수 user_mid 존재하느냐 안하느냐 확인하는 변수(isset) - 로그인 안 됐을 시 로그인 창으로 이동
		header('Location: /index.php');
	} else{
		// 게시글 삭제
	    if($_POST['mid']==$_SESSION['user_mid']){ // 악의적 공격 막기 위해 폼이나 url에서 mid 입력 방지하기 위해 ssesion 이용해서 mid 받아옴
			$mid = mysqli_real_escape_string($con,$_SESSION['user_mid']);
			$bid = mysqli_real_escape_string($con,$_POST['bid']);
			$sql = "delete from board WHERE `board`.`BID`=$bid and `board`.`MID`=$mid";
			if(!mysqli_query($con, $sql)){
				echo "".mysqli_error($con);
			};
			mysqli_close($con);
			echo "true"; // 입력 완료 시 페이지 이동
		} else{
			echo "false";
		}
	}
 ?>
