<?php
if(isset($_POST['verify'])){
	echo $_POST['text'];
	echo '<br>';
	echo $_POST['hash'];
	if(hash('sha256', $_POST['text']) == $_POST['hash']){
		echo '
		<script>alert("Verified");</script>
		';
	}
	else {
		echo '
		<script>alert("Not verified");</script>
		';
	}
}	

if(isset($_POST['generate'])){
	$passwordhash = hash('sha256', $_POST['input']);
	echo $passwordhash;
}
?>
<html>

<body>

	<form method="post" style="display: inline;">
	Text:
	<input style="display: inline;" name="text" type="text">
	<br>
	Hash:
	<input style="display: inline;" name="hash" type="text">
	<br>
	<input name="verify" type="submit" value="verify">
	</form>
	
	
	<br><br>
	Generate Hash:<br>
	<form method="post" style="display: inline;">
	Text:
	<input style="display: inline;" name="input" type="text">
	<br>
	<input name="generate" type="submit" value="hash">
	</form>
	
	
</body>
</html>