<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="signup.css"; type="text/css">
        <link rel="stylesheet" href="../menubar/MenuBar.css"; type="text/css">
    </head>
    <body>
    <?php
        $host='0.tcp.ngrok.io:10930';
        $sqlUser = 'root';
        $sqlPW = '1234';
        $sqlDB='pcreview';
        $db = new mysqli($host,$sqlUser,$sqlPW,$sqlDB);
        if(mysqli_connect_errno()){
            echo 'error try again later';
            exit;
        }
        @session_start();

        $id=$_GET['id'];
        $query = "SELECT * FROM USERINFO WHERE ID=?;";
        $stmt=$db->prepare($query);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $stmt->store_result();
        $row = $stmt->num_rows;
        
        if($row==0){
            ?>
	<div><?php echo $id; ?>는 사용가능한 아이디입니다.</div>
<?php 
	}else{
?>
	<div style='color:red;'><?php echo $id; ?>중복된아이디입니다.<div>
<?php
	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>
</body>
</html>
