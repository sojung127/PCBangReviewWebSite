<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PCroom Map data</title>
	</head>

	<body>
    <?php
        require("dbinfo.php");
        
        // Opens a connection to a MySQL server
        $db=mysqli_connect ('0.tcp.ngrok.io:13767', $username, $password,$database);
        if($db){
            echo "connect : 성공<br>";
        }
        else{
            echo "disconnect : 실패<br>";
        }

        $query = "SELECT * from pcbinfo;";
        $result = mysqli_query($db, $query);
 
        // .= 연산자를 이용해 문자열을 합친다.
        $xmlDoc = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; // XML 선언부
        $xmlDoc .= "<markers>";
 
        // 쿼리 결과에서 컬럼명을 이용해 컬럼 값을 가져온다.
        while ($obj = mysqli_fetch_object($result)) {
                $markerNUM= $obj->PCBNUM;
                $markerNAME = $obj->PCBNAME;
                $markerADDRESS = $obj->ADDRESS;
                $markerLAT = $obj->lat;
                $markerLNG = $obj->lng;
                
                $xmlDoc .= "<marker";
                $xmlDoc .= " ID ='$markerNUM'";
                $xmlDoc .= " name ='$markerNAME'";
                $xmlDoc .= " address = '$markerADDRESS'";
                $xmlDoc .= " lat = '$markerLAT'";
                $xmlDoc .= " lng = '$markerLNG'";
                $xmlDoc .= " />";
        }
 
        $xmlDoc .= "</markers>";

        // XML 파일이 저장될 경로 및 파일 이름을 설정한다.
        $document_root = $_SERVER['DOCUMENT_ROOT']; //다른 html 파일들과 같은 장소
        $filename = $document_root."/mapXML.xml";
        
        // XML 파일을 저장한다. 기존 파일이 이미 있다면 덮어쓰기한다.
        file_put_contents($filename, $xmlDoc);
        $db->close();

        ?>
	</body>
</html>
