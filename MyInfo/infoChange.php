<?php


@session_start();

$passwd=md5($_POST['pw']);
$passwd_check=md5($_POST['pw_re']);
$addr = $_POST['sido1'].$_POST['gugun1'];
$email = $_POST['email'];

if($passwd==$passwd_check){
    @$db = new mysqli('0.tcp.ngrok.io:13767','root','1234','pcreview');
    if(mysqli_connect_errno()){
        echo 'error try again later';
        exit;
    }
}else{
    echo "<script> alert('비밀번호를 다시 확인해주세요');</script>";
    echo "<script>location.href='myinfochange.html'</script>";
}



$query = "UPDATE USERINFO SET PASSWD=?, ADDRESS=?, EMAIL=? WHERE ID=?";

$stmt = $db->prepare($query);
$stmt->bind_param('ssss',$passwd,$addr,$email,$_SESSION['login']);
$stmt->execute();

if($stmt->affected_rows > 0){
    echo "<p>User inserted into the databases.</p>";
    echo "<script>location.href='../login/login.html';</script>";
}else{
    echo "<p>insert error</p>";
}

$db->close();


?>