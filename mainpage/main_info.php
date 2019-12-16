<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
</head>

<?php

echo "로딩중입니다....";

include('search.php');

$img_num = $_POST['I'];
$PCBNUM = 0;

switch($img_num){

	case "1":
		$PCBNUM = $NUM1[0];
		break;
	case "2":
		$PCBNUM = $NUM1[1];
		break;
	case "3":
		$PCBNUM = $NUM1[2];
		break;
	case "4":
		$PCBNUM = $NUM1[3];
		break;
	case "5":
		$PCBNUM = $NUM2[0];
		break;
	case "6":
		$PCBNUM = $NUM2[1];
		break;
	case "7":
		$PCBNUM = $NUM2[2];
		break;
	case "8":
		$PCBNUM = $NUM2[3];
		break;
	default:
		break;
}
?>

<body>
	<form name="HiddenForm" method="post" action="../PCBangInfo/PCBangInfo.php">
		<input type="hidden" name="num" value=<?php echo $PCBNUM; ?>>
		<script> document.HiddenForm.submit();</script>
	</form>


</body>

</html>
