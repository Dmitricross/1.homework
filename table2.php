<?php
	
	//table
	//getting out confing
	
	require_once("../../config.php");
	
	//create connection to database
	
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_dmikab");
	
	//SQL sentence
	
	$stmt = $mysql->prepare("SELECT id, First_Name, Last_Name, E_mail, Message, created FROM homework");
	
	//if error in sentense
	
	echo $mysql->error;
	
	$stmt->bind_result($id, $First_Name, $Last_Name, $E_mail, $Message, $created);
	
	$stmt->execute();

	$table_html = "";

$table_html .="<table>";
$table_html .="<tr>";
$table_html .="<th>id</th>";
$table_html .="<th>Fist name</th>";
$table_html .="<th>Last Name</th>";
$table_html .="<th>E-mail</th>";
$table_html .="<th>Message</th>";
$table_html .="<th>Result</th>";
$table_html .="</tr>";


	
	//Get result
	//we have multiple rows
	while($stmt->fetch()){


		$table_html .="<tr>";
		$table_html .= "<td>".$id."</td>"; //add column
		$table_html .= "<td>".$First_Name."</td>";
		$table_html .= "<td>".$Last_Name."</td>";
		$table_html .= "<td>".$E_mail."</td>";
		$table_html .= "<td>".$Message."</td>";
		$table_html .= "<td>".$created."</td>";
		$table_html .="</tr>"; //end row
		
		//DO something for EACH ROW
		
		//echo $id."  ".$message."<br>";
		
		}
		$table_html .="</table>";
		echo $table_html;
	
	
	?>
	<a href ="app.php">table</a>