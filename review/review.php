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


@$db = new mysqli('localhost','test','1234','temp');
if(mysqli_connect_errno()){
    echo 'error try again later';
    exit;
}

$path="/uploads/".$_FILES['image']['name'];


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


$query = "INSERT INTO pcbreview VALUES (NULL,1,'sjmscci',?,?,?,?,?,?,?,?,?,?,?,4.0,?)";
$nullVar=null;

$stmt = $db->prepare($query);
$stmt->bind_param('sssiiiiiiiis',$speed,$clean,$etc,$pf1,$pf2,$pf3,$game1,$game2,$game3,$game4,$game5,$path);
$stmt->execute();

if($stmt->affected_rows > 0){
    echo "<p>User inserted into the databases.</p>";
    echo "<script>location.href='reviewWrite.html';</script>";  //추후 리뷰 상세 페이지로 이동하도록 수정
}else{
    echo "<p>insert error</p>";
}

$db->close();

?>