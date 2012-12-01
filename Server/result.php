<?php
$post=$_POST;
//var_dump($post);
$post['isagent'] = 0;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("trackmateapp", $con);
// some code
?> 
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Entry Successful!</title>
	<script language="javascript">
    </script>
</head>
<body>
	<?php
		if($post['source']=='post'){
			echo 'Meeting entry successful!';
			$meetdatestamp = $post['meetyear'].'-'.$post['meetmonth'].'-'.$post['meetday'];
			$query = 'INSERT INTO meeting (date, topic) VALUES ("'.$meetdatestamp.'", "'.$post['meettopic'].'")';
			mysql_query($query);
			$getq = "SELECT meetid FROM meeting ORDER BY meetid DESC LIMIT 1";
			$meetid = mysql_fetch_array(mysql_query($getq));
			foreach ($post['task'] as $key => $value) {
				if($post['task']!=''){
					//echo $key.'-'.$value;
					$query2 = "INSERT INTO task (task, meetid) VALUES ('".$value."', '".$meetid['meetid']."')";
					mysql_query($query2);	
				}
				
			}
			//echo "<br />";
		}
		elseif($post['source']=='user'){
			$query ="INSERT INTO user (fname, lname, pass, contact, isagent) VALUES ('".$post['fname']."', '".$post['lname']."', '".$post['pass']."', '".$post['contact']."', '".($post['isagent']==''? '0': '1')."')";
			mysql_query($query);
			$getq = "SELECT userid FROM user ORDER BY userid DESC LIMIT 1";
			$userid = mysql_fetch_array(mysql_query($getq));
			$query2 = "INSERT INTO location (lat, long, userid) VALUES ('".$post['lat']."', '".$post['long']."', '".$userid."')";
			mysql_query($query2);
			echo 'New user Created!';
		}
		else {
			echo "failed!";
		}
	?>
</body>
</html>
