<?php
    $user = check_param("user");
    $pass = check_param("pass");
    
    session_start();
           
    if (checkUser($user, $pass)) {
            $_SESSION["login"] = $user;
            $_SESSION["begin"] = date("F j, Y, g:i:s a");
            echo '<script>parent.location.href="../mainpage/mainpage_login.php"</script>';

        } else {
            header("Location: login.html");
        }
    
function check_param($var) {
    if (!isset($_POST[$var]) || $_POST[$var] == "") {
        die("Error : missing required parameter '$var'");
    }
    return trim($_POST[$var]);
}

function checkUser($user, $pass) {

    @$db = new mysqli('localhost','root','1234','pcreview');

    // $myusername = mysqli_real_escape_string($db,$_POST[$user]);
    // $mypassword = mysqli_real_escape_string($db,$_POST[$pss]); 

    //   echo $mypassword;
    //   echo $myusername;
      
      $sql = "SELECT id FROM userinfo WHERE id = '$user' and passwd = md5('$pass')";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
          echo "메인 페이지로 이동 중입니다. 잠시만 기다려주세요.";
         return 1;
      }else {
          echo "ID 혹은 비밀번호를 잘못 입력하였습니다. 다시 시도해주세요.";
         return 0;
      }
   }
    
?>