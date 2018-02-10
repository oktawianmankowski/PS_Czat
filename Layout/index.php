<?php
?>

<html>
<head>
<title>Chat - Projekt</title>
	<link type="text/css" rel="stylesheet" href="style.css" />
	<link type="text/css" rel="stylesheet" href="bootstrap.min.css" />

<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>

function submitChat() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>


</head>


<body>
	<div id="wrapper">
		
	<p class="welcome"><h1>ChatBox-2018</h1><b></b></p>	
		
	 <div class="btn-group">
		  <button type="button" class="btn btn-primary" value="Input Button" onclick="location.href = 'filesSendingPage.html';">Send file</button>
		  <button type="button" class="btn btn-primary">Fonts</button>			  
	</div>

	<button type="button" class="btn">Logout</button>
	
	<br><br>
	
		<form name="form1">
		Enter Your Chatname: <input type="text" name="uname" /> <br><br>
		
		
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 "> 
				<form action="/action_page.php">   
					<div class="form-group">
						<input type="text" class="form-control" id="msg"" placeholder="Put here some text" name="msg">			        
					</div>
				</form>
			</div>
	    </div>
	  
	  		
		<button type="submit" class="btn btn-default"><a href="#" onclick="submitChat()">   Send   </a></button><br><br>
				
		</form>
		
	<div id="chatlogs">
		LOADING CHATLOG...
	</div>
</div>
</body>