<!doctype html>
<?php
	$months = array('1' => 'January',
'2' => 'February',
'3' => 'March',
'4' => 'April',
'5' => 'May',
'6' => 'June',
'7' => 'July',
'8' => 'August',
'9' => 'September',
'10' => 'October',
'11' => 'November',
'12' => 'December',
	);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Task Input for TrackMate</title>
	<script language="javascript">
    fields = 3;
    function addInput() {
    	//if (fields != 10) {
    	//if (1) {
    		fields += 1;
    		document.getElementById('text').innerHTML += "<div class=\"question-box\"><label for=\"task"+fields+"\">Task "+fields+" </label><br /><input type=\"text\" id=\"task"+fields+"\" name=\"task[]\"  size=\"50\" value=\"\" placeholder=\"Type the task\" /></div>";
      		
     	//} else {
      	//	document.getElementById('text').innerHTML += "<br />Only 10 upload fields allowed.";
      	//	document.form.add.disabled=true;
     	//}
    }
  	</script>
</head>
<body class="center">
	<div id="title">Task Input for TrackMate</div>
	<div class="content">

	<form name="form" action="result.php" method="post">		
		<input type="hidden" id="source" name="source" value="post"/>
		<div id="text">
			<div class="question-box"><label for="meetday">Meeting Date</label><br />
			<select id="meetday" name="meetday">
				<option>Day</option>
				<?php
					$i=1;
					for($i=1; $i<=31;$i++){
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				?>
			</select>
			<select id="meetdmonth" name="meetmonth">
				<option>Month</option>
				<?php
					//$i=1;
					foreach ($months as $key => $value) {
						echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
			<input id="meetyear" name="meetyear" type="number" placeholder="Year"/></div>
			<div class="question-box"><label for="meettopic">Meeting topic</label><br /><input id="meettopic" name="meettopic" size="50" type="text" placeholder="Type the meeting topic"/></div>
			<div class="question-box"><label for="task1">Task 1 </label><br /><input id="task1" name="task[]" size="50" type="text" placeholder="Type the task"/></div>
			<div class="question-box"><label for="task2">Task 2 </label><br /><input id="task2" name="task[]" size="50" type="text" placeholder="Type the task"/></div>
			<div class="question-box"><label for="task3">Task 3 </label><br /><input id="task3" name="task[]" size="50" type="text" placeholder="Type the task"/></div>
		</div>		
		<div class="question-box"><input type="submit" name="submit" value="Submit Tasks" />&nbsp;<input type="button" onclick="addInput()" name="add" value="Add input field" /></div>
	</form>
	</div>
</body></html>
