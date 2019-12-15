<?php



$speed=$_POST['speed'];
$clean=$_POST['clean'];
$etc = $_POST['etc'];

$pf1 = $pf2 = $pf3 = 0;
$game1=$game2=$game3=$game4=$game5=0;

if(@$_POST['game1']=='game1')
    $game1 = 1;
if(@$_POST['game2']=='game2')
    $game2 = 1;
if(@$_POST['game3']=='game3')
    $game3 = 1;
if(@$_POST['game4']=='game4')
    $game4 = 1;
if(@$_POST['game5']=='game5')
    $game5 = 1;

if(@$_POST['pf1']=='pf1')
    $pf1 = 1;
if(@$_POST['pf2']=='pf2')
    $pf2 = 1;
if(@$_POST['pf3']=='pf3')
    $pf3 = 1;


@$db = new mysqli('0.tcp.ngrok.io:17235','root','1234','pcreview');
if(mysqli_connect_errno()){
    echo 'error try again later';
    exit;
}

// $path="../uploads/".$_FILES['image']['name'];

$target_dir = '../uploads/';
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
// $uploadOK=1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$filename = $_FILES['fileToUpload']['name'];
$imgurl = "../uploads/".$_FILES['fileToUpload']['name'];
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../uploads/{$_FILES['fileToUpload']['name']}");

@session_start();
$userquery = 'select usernum from USERINFO where id=?';
$stmt =  $db->prepare($userquery);
$USER=$_SESSION['login'];
$stmt->bind_param('s',$USER);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$usernum=$result['usernum'];

$query = "INSERT INTO pcbreview VALUES (null,5,?,?,?,?,?,?,?,?,?,?,?,?,4,?)";
$nullVar=null;

$stmt = $db->prepare($query);
$stmt->bind_param('isssiiiiiiiis',$usernum,$speed,$clean,$etc,$pf1,$pf2,$pf3,$game1,$game2,$game3,$game4,$game5,$imgurl);
$stmt->execute();

if($stmt->affected_rows > 0){
    //마일리지 적립
    $query = "SELECT MILEAGE FROM USERINFO WHERE USERNUM=".$usernum;
    $result = mysqli_query($db,$query);
    $row =  mysqli_fetch_assoc($result);
    $mileage =$row['MILEAGE'];
    $mileage=$mileage+100;
    $query = "UPDATE USERINFO SET MILEAGE='.$mileage.' WHERE USERNUM=".$usernum;
    mysqli_query($db,$query);
    echo "<p>리뷰 등록중입니다. 잠시만 기다려주세요.</p>";
    @session_start();
    $_SESSION['RECENT REVIEW'] = 1;
    echo "<script>location.href='../pcbanginfo/pcbanginfo.html';</script>";  //추후 리뷰 상세 페이지로 이동하도록 수정
    
    //echo "<script target='body'>location.href='../mainpage/mainpage.html';</script>";
}else{
    echo "<p>insert error</p>";
}

$db->close();

?>


// if(isset($_FILES['image']) && !$_FILES['image']['error'])

// {

//   //허용할 이미지 종류를 배열로 저장

//   $imageKind = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');

  

//   //imageKind 배열내에 $_FILES['upload']['type']에 해당되는 타입(문자열) 있는지 체크

//   if(in_array($_FILES['image']['type'], $imageKind))

//   {

//     if(move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/{$_FILES['image']['name']}"))

//     {

//     //   $query = "update recommended set name='$name', url='$url', showing_url='$showurl', img_path='$path' where idx=1";

//     //   $db->query($query);

//     //   echo ("<script>location.replace('./');</script>");

//     }

//   }
