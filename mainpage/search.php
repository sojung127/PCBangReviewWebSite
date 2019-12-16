<?php

@$db = new mysqli('0.tcp.ngrok.io:10930','root','1234','pcreview');
if(mysqli_connect_errno()){
    echo 'error try again later';
    exit;
}

$IMG1 = array();
$IMG2 = array();


$NUM1 = array();
$NUM2 = array();

$NAME1 = array();
$NAME2 = array();

$query = "SELECT COUNT(pcbreview.PCBNUM), pcbreview.PCBNUM,pcbinfo.PCBimage, pcbinfo.PCBNAME
	FROM pcbreview
	JOIN pcbinfo
	ON pcbreview.PCBNUM=pcbinfo.PCBNUM
	GROUP BY pcbreview.PCBNUM
	ORDER BY COUNT(pcbreview.PCBNUM) DESC
	LIMIT 1, 5";

$result = mysqli_query($db, $query);

while($row = mysqli_fetch_assoc($result)){
		array_push($IMG1, $row['PCBimage']);
		array_push($NUM1, $row['PCBNUM']);
		array_push($NAME1, $row['PCBNAME']);
}

$query = "SELECT pcbreview.reviewNUM, pcbreview.PCBNUM,pcbinfo.PCBimage, pcbinfo.PCBNAME
	FROM pcbreview
	JOIN pcbinfo
	ON pcbreview.PCBNUM=pcbinfo.PCBNUM
	ORDER BY pcbreview.reviewNUM DESC
	LIMIT 1, 5";

$result = mysqli_query($db, $query);

while($row = mysqli_fetch_assoc($result)){
		array_push($IMG2, $row['PCBimage']);
		array_push($NUM2, $row['PCBNUM']);
		array_push($NAME2, $row['PCBNAME']);
}


/*
$query = "SELECT COUNT(R.PCBNUM), R.PCBNUM, I.IMAGE, I.PCBNAME FROM pcbreview AS R JOIN pcbinfo AS I ON R.PCBNUM=I.PCBNUM" 

$result = mysqli_query($db, $query);

while($row = mysqli_fetch_assoc($result)){
		global $IMG;
		$IMG1_1=$row['I.IMAGE'];
		$NUM1_1=$row['I.PCBNAME'];
		echo $IMG1_1;
		echo $NUM1_1;
	}

/*
while($stmt->fetch()){
	echo "<p>count : ".$COUNT_1;
	echo "<br />PCBNUM : ".$PCBNUM_1;
	echo "<br />IMAGE : ".$IMAGE_1;
}
*/

/*
$query = "SELECT COUNT(PCBNUM), PCBNUM, IMAGE FROM pcbreview GROUP BY PCBNUM ORDER BY COUNT(PCBNUM) DESC LIMIT 2, 1";

	$result = mysqli_query($db, $query);

	while($row = mysqli_fetch_assoc($result)){
		global $IMG;
		$IMG=$row['IMAGE'];
	}

/*
while($stmt->fetch()){
	echo "<p>count : ".$COUNT_2;
	echo "<br />PCBNUM : ".$PCBNUM_2;
	echo "<br />IMAGE : ".$IMAGE_2;
} 
*/

/*
$_POST["IMAGE_2"] = $IMAGE_2;

$query = "SELECT COUNT(PCBNUM), PCBNUM, IMAGE FROM pcbreview GROUP BY PCBNUM ORDER BY COUNT(PCBNUM) DESC LIMIT 3, 1";
$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($COUNT_3, $PCBNUM_3, $IMAGE_3);

/*
while($stmt->fetch()){
	echo "<p>count : ".$COUNT_3;
	echo "<br />PCBNUM : ".$PCBNUM_3;
	echo "<br />IMAGE : ".$IMAGE_3;
}*/

/*
$query = "SELECT COUNT(PCBNUM), PCBNUM, IMAGE FROM pcbreview GROUP BY PCBNUM ORDER BY COUNT(PCBNUM) DESC LIMIT 4, 1";
$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($COUNT_4, $PCBNUM_4, $IMAGE_4);

/*
while($stmt->fetch()){
	echo "<p>count : ".$COUNT_4;
	echo "<br />PCBNUM : ".$PCBNUM_4;
	echo "<br />IMAGE : ".$IMAGE_4;
}
*/

/*
$query = "SELECT COUNT(PCBNUM), PCBNUM, IMAGE FROM pcbreview GROUP BY PCBNUM ORDER BY COUNT(PCBNUM) DESC LIMIT 5, 1";
$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($COUNT_5, $PCBNUM_5, $IMAGE_5);

/*
while($stmt->fetch()){
	echo "<p>count : ".$COUNT_5;
	echo "<br />PCBNUM : ".$PCBNUM_5;
	echo "<br />IMAGE : ".$IMAGE_5;
}*/

///////////////////////////

/*
$query = "SELECT reviewNUM, PCBNUM, REVIEWER, IMAGE FROM pcbreview ORDER BY reviewNUM DESC LIMIT 1, 1";

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($reviewNUM_1, $PCBNUM2_1, $REVIEWER_1, $IMAGE2_1);


/*
while($stmt->fetch()){
	echo "<p>reviewNUM : ".$reviewNUM_1;
	echo "<br />PCBNUM : ".$PCBNUM2_1;
	echo "<br />REVIEWER : ".$REVIEWER_1;
	echo "<br />IMAGE : ".$IMAGE2_1;
}*/

/*
$query = "SELECT reviewNUM, PCBNUM, REVIEWER, IMAGE FROM pcbreview ORDER BY reviewNUM DESC LIMIT 2, 1";

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($reviewNUM_2, $PCBNUM2_2, $REVIEWER_2, $IMAGE2_2);

/*
while($stmt->fetch()){
	echo "<p>reviewNUM : ".$reviewNUM_2;
	echo "<br />PCBNUM : ".$PCBNUM2_2;
	echo "<br />REVIEWER : ".$REVIEWER_2;
	echo "<br />IMAGE : ".$IMAGE2_2;
}*/

/*
$query = "SELECT reviewNUM, PCBNUM, REVIEWER, IMAGE FROM pcbreview ORDER BY reviewNUM DESC LIMIT 3, 1";

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($reviewNUM_3, $PCBNUM2_3, $REVIEWER_3, $IMAGE2_3);

/*
while($stmt->fetch()){
	echo "<p>reviewNUM : ".$reviewNUM_3;
	echo "<br />PCBNUM : ".$PCBNUM2_3;
	echo "<br />REVIEWER : ".$REVIEWER_3;
	echo "<br />IMAGE : ".$IMAGE2_3;
}*/

/*
$query = "SELECT reviewNUM, PCBNUM, REVIEWER, IMAGE FROM pcbreview ORDER BY reviewNUM DESC LIMIT 4, 1";

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($reviewNUM_4, $PCBNUM2_4, $REVIEWER_4, $IMAGE2_4);

/*
while($stmt->fetch()){
	echo "<p>reviewNUM : ".$reviewNUM_4;
	echo "<br />PCBNUM : ".$PCBNUM2_4;
	echo "<br />REVIEWER : ".$REVIEWER_4;
	echo "<br />IMAGE : ".$IMAGE2_4;
}*/

/*
$query = "SELECT reviewNUM, PCBNUM, REVIEWER, IMAGE FROM pcbreview ORDER BY reviewNUM DESC LIMIT 5, 1";

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($reviewNUM_5, $PCBNUM2_5, $REVIEWER_5, $IMAGE2_5);

/*
while($stmt->fetch()){
	echo "<p>reviewNUM : ".$reviewNUM_5;
	echo "<br />PCBNUM : ".$PCBNUM2_5;
	echo "<br />REVIEWER : ".$REVIEWER_5;
	echo "<br />IMAGE : ".$IMAGE2_5;
}
*/

?>