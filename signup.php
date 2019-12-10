<?php
$name=$_POST['name'];
$nick=$_POST['nick'];
$id=$_POST['id'];
$passwd=md5($_POST['pw']);
$passwd_check=md5($_POST['pw_re']);
$tel = $_POST['telephone'];
$addr = $_POST['sido1'].$_POST['gugun1'];
$email = $_POST['email'];

echo $name;
echo $nick;
echo $id;
echo $passwd;
echo $passwd_check;
echo $tel;
echo $addr;
if($passwd==$passwd_check){
    @$db = new mysqli('localhost','root','1234','pcreview');
if(mysqli_connect_errno()){
    echo 'error try again later';
    exit;
}

$query = "INSERT INTO userinfo VALUES (?,?,?,?,?,?,?,0,0,NULL)";
$nullVar=null;

$stmt = $db->prepare($query);
$stmt->bind_param('sssssss',$name,$id,$passwd,$nick,$tel,$addr,$email);
$stmt->execute();

if($stmt->affected_rows > 0){
    echo "<p>User inserted into the databases.</p>";
    echo "<script>location.href='login.html';</script>";
}else{
    echo "<p>insert error</p>";
}

$db->close();
}else{
    echo "비밀번호 틀림";
}


?>