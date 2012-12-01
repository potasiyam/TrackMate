<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Create agent for TrackMate</title>
	<script language="javascript">
    
  	</script>
</head>
<body class="center">
	<div id="title">User Input for TrackMate</div>
	<div class="content">
	<form name="form" action="result.php" method="post">
			<input type="hidden" id="source" name="source" value="user"/>
			<div class="question-box"><label for="fname">First name</label><br /><input id="fname" name="fname" type="text" size="50" placeholder=""/><br /></div>
			<div class="question-box"><label for="lname">Last name</label><br /><input id="lname" name="lname" type="text" size="50" placeholder=""/><br /></div>
			<div class="question-box"><label for="pass">Password</label><br /><input id="pass" name="pass" type="password" size="50" placeholder=""/><br />	</div>		
			<div class="question-box"><label for="contact">Contact</label><br /><input id="contact" name="contact" type="text" size="50" placeholder=""/><br /></div>
			<div class="question-box"><label for="lat">Latitude</label><br /><input type="number" size="50" step="any" id="lat" name="lat" /><br /></div>
			<div class="question-box"><label for="long">Longitude</label><br /><input type="number" size="50" step="any" id="long" name="long" /><br /></div>
		<div class="question-box"><input type="submit" name="submit" value="Create Agent" /></div>
	</form>
</div>
</body></html>
