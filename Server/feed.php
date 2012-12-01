<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("trackmateapp", $con);

$getq = "SELECT meetid FROM meeting ORDER BY meetid DESC LIMIT 1";
$meetid = mysql_fetch_array(mysql_query($getq));
$getq2 = "SELECT * FROM task WHERE meetid ='".$meetid['meetid']."'";
//var_dump($getq2);
$resulttasks = mysql_query($getq2);
//var_dump($resulttasks);

// while($row = mysql_fetch_array($resulttasks))
//   {  
// 	  //echo $row['task'] . " ".$row['taskid']." ".$row['meetid'];
// 	  ////echo "<td>" . $row['taskid'] . "</td>";
// 	  //echo "</tr>";
//   }

$i=1;
$xml = new SimpleXMLElement('<xml/>');
//$xml->addChild('meetingID', $row['meetid']);
while($row = mysql_fetch_array($resulttasks)) {
if($i==1)	
$xml->addChild('meetingID', $row['meetid']);
$i++;
    $tasks = $xml->addChild('task');
    $tasks->addChild('taskID', $row['taskid']);
    $tasks->addChild('toDo', $row['task']);
}
Header('Content-type: text/xml');
print($xml->asXML());
?>