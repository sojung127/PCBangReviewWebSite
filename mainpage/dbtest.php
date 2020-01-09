<?php

@$db = new mysqli('localhost','root','1234','pcreview');
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

echo $IMG1[0]."<br/>";
echo $NUM1[0]."<br/>";
echo $NAME1[0]."<br/><br/>";

echo $IMG1[1]."<br/>";
echo $NUM1[1]."<br/>";
echo $NAME1[1]."<br/><br/>";

echo $IMG1[2]."<br/>";
echo $NUM1[2]."<br/>";
echo $NAME1[2]."<br/><br/>";

echo $IMG1[3]."<br/>";
echo $NUM1[3]."<br/>";
echo $NAME1[3]."<br/><br/>";

echo $IMG1[4]."<br/>";
echo $NUM1[4]."<br/>";
echo $NAME1[4]."<br/><br/>";


?>