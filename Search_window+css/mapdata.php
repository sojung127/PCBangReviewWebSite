<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PCroom Map data</title>
	</head>

	<body>
    <?php
        require("dbinfo.php");

        // Start XML file, create parent node
        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("pcbinfo");
        $parnode = $dom->appendChild($node);
        
        // Opens a connection to a MySQL server
        $connection=@mysql_connect ('localhost', $username, $password);
        if (!$connection) {  die('Not connected : ' . mysql_error());}

        // Set the active MySQL database
        $db_selected = mysql_select_db($database, $connection);
        if (!$db_selected) {
            die ('Can\'t use db : ' . mysql_error());
        }

        // Select all the rows in the markers table
        $query = "SELECT * FROM pcbinfo";
        $result = mysql_query($query);
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }
        
        header("Content-type: text/xml");

        // Iterate through the rows, adding XML nodes for each
        while ($row = @mysql_fetch_assoc($result)){

        // Add to XML document node
        $node = $dom->createElement("pcbinfo");
        $newnode = $parnode->appendChild($node);
        $newnode->setAttribute("PBCNUM",$row['pcbnum']);
        $newnode->setAttribute("PBCNAME",$row['pcbname']);
        $newnode->setAttribute("ADDRESS", $row['address']);
        $newnode->setAttribute("lat", $row['lat']);
        $newnode->setAttribute("lng", $row['lng']);
        }
        
     
        echo $dom->saveXML();
    ?>

	</body>
</html>
