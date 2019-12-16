<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PCBREVIEW</title>
	<link rel="stylesheet" href="mainpagecss.css"> 
	<link rel="stylesheet" href="../menubar/MenuBar.css">

	<link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css"/>

	<script type ="text/javascript" src = "mainpagescript.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="slick-1.8.1/slick/slick.min.js"></script>
	<script src="address.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
  	$('.your-class').slick({
    	dots: true,
    	infinite: false,
    	slidesToShow : 3,
    	slidesToScroll : 1,
    	arrows : true,

  	});
	});
	</script>
</head> 

<body> 

<?php include('search.php'); ?>
<?php 
	@$db = new mysqli('0.tcp.ngrok.io:10930','root','1234','pcreview');
	if(mysqli_connect_errno()){
    	echo 'error try again later';
    	exit;
	}

?>
<?php
	@session_start();
	$_SESSION['prevPage']=$_SERVER['REQUEST_URI'];
	if(isset($_SESSION['login'])){
		header('Location:mainpage_login.php');
	}
?>

<div class="hero-image">

	<header>
		<div class="wrap">
			<div class="menubar">
				<ul class="menuLogo">
					<li><a href="../review/reviewWriteFrame.html">리뷰하기</a></li>
					
				</ul>
				<ul class="menuItem">
					<li><a href="../login/loginFrame.html">로그인</a></li>
					<li><a href="../signup/signupFrame.html">회원가입</a></li>
				</ul>
			</div>
		</div>
	</header>

	<form name="f" onSubmit="checkForm()" method="post">
	<div class="search">
		<div class ="search_in">
			<select name="sido1" id="sido1" class="select_box"></select>
            <select name="gugun1" id="gugun1" class="select_box"></select>
		</div>
		<div class="search_in">
		<span class='green_window'>
			<input type='text' name="search_word" class='input_text' style="background-color:transparent;">
		</span>
		<a href="..\Search_window+css\search_window_frame.html"><button type='submit' class='sch_smit' style="background-color:transparent;">검색</button></a>
		</div>
	</div>
	</form>

	<script type="text/javascript">
		function checkForm(){
			form = document.f;
			var word = form.search_word.value;
			if(form.sido1.value=="시/도 선택"  && word=="")
				alert("주소를 선택하거나 검색어를 입력해주세요!");
		}
	</script>
</div>

<div class="contents">

	<h1>리뷰 수 많은 PC방</h1>
	

	<div class="your-class" align="center" style="width:90%; left: 5%;">
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="1">
			<input type="image" src=<?php echo $IMG1[0] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME1[0];?>
		</div>
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="2">
			<input type="image" src=<?php echo $IMG1[1] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME1[1];?>
		</div>
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="3">
			<input type="image" src=<?php echo $IMG1[2] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME1[2];?>
		</div>
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="4">
			<input type="image" src=<?php echo $IMG1[3] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME1[3];?>
		</div>
		
	</div>

	<h1>최근 리뷰가 작성된 PC방</h1> 
	
	<div class="your-class" align="center" style="width:90%; left: 5%;">
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="5">
			<input type="image" src=<?php echo $IMG2[0] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME2[0];?>
		</div>
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="6">
			<input type="image" src=<?php echo $IMG2[1] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME2[1];?>
		</div>
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="7">
			<input type="image" src=<?php echo $IMG2[2] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME2[2];?>
		</div>
		<div>
			<form action="main_info.php" method="post">
			<input type="hidden" name="I" value="8">
			<input type="image" src=<?php echo $IMG2[3] ?> width=500px height=360px style="border: 50 solid lightgray"
			vspace=10 hspace=10>
			</form>
			<?php echo $NAME2[3];?>
		</div>
	</div>


	
	
</div>


</body> 
</html> 
