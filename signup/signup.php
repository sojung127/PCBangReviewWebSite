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
    @$db = new mysqli('0.tcp.ngrok.io:13767','root','1234','pcreview');
    if(mysqli_connect_errno()){
        echo 'error try again later';
        exit;
    }
    $query = 'SELECT * FROM USERINFO WHERE ID="'.$id.'"';
    $result = mysqli_query($db,$query);
    $row = mysqli_num_rows($result);
    if($row!=0){
        echo "<script> alert('중복된 ID는 사용할 수 없습니다.');</script>";
        echo "<script>location.href='signup.html'</script>";
    }else{

        $query = "INSERT INTO userinfo VALUES (?,?,?,?,?,?,?,0,0,NULL)";

        $stmt = $db->prepare($query);
        $stmt->bind_param('sssssss',$name,$id,$passwd,$nick,$tel,$addr,$email);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            echo "<p>User inserted into the databases.</p>";
            echo "<script>location.href='../login/login.html';</script>";
        }else{
            echo "<script> alert('회원가입 진행 중 오류가 발생하였습니다. 다시 시도해주세요.');</script>";
            echo "<script>location.href='signup.html'</script>";
        }
    }
    $db->close();
}else{
    echo "<script> alert('비밀번호를 다시 확인해주세요');</script>";
    echo "<script>location.href='signup.html'</script>";

}
 

?>