<?php
/**
 * PHPCaptcha - PHP Class for verifying user-inputs and preventing bot spamming
 * PHP Version 8.0
 * 
 * @see https://github.com/lgbSalzburg/PHPCaptcha/ 
 *
 * @author lgbSalzburg
 */


class PHPCaptcha{
	
	
	
	
	
}

	$imagesDir = 'img/';

	$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
	
	$randomImage = $images[array_rand($images)];

	
	$hash = substr($randomImage, 4, 64);
	
if(isset($_POST['verify'])){
	
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



?>

	<form method="post" style="display: inline;">
	Text:
	<input style="display: inline;" name="text" type="text">
	<br>
	<?php echo '<img src="'.$randomImage.'">';?>
	<br>
	<input style="display:none;" name="hash" type="text" value="<?php echo $hash;?>">
	<br>
	<input name="verify" type="submit" value="verify">
	</form>