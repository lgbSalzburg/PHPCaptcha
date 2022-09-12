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
	
	private $imagesDir = "";
	private $image;
	private $width = 300;
	private $button = false;
	
	public function __construct(string $path){
		$this->imagesDir = $path;
	}
	
	public function getRandomImage(){

	
	$images = glob($this->imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
	
	$randomImage = $images[array_rand($images)];
	
	return $randomImage;
	}
	
	public function getHash($randomImage){
		$hash = substr($randomImage, 4, 64);
		return $hash;
	}
	
	public function setWidth($width){
		$this->width = $width;
	}

	public function displayButton($button){
		$this->button = $button;
	}
	
	public function render(){
		
		$this->image = $this->getRandomImage();
		$preview = '
		<form method="post" style="display: inline;">
		<input style="display: inline;" name="input" type="text">
		<br>
		<img src="';
		$preview .= $this->image;
		$preview .= '" onContextMenu="return false;" style="width:'.$this->width.'px;">
		<br>
		<input style="display:none;" name="hash" type="text" value="';
		$preview .= $this->getHash($this->image);
		$preview .= '">';
		if($this->button)
			$preview .= '<input name="verify" type="submit" value="verify">';
		$preview .= '</form>';
		
		
		return $preview;
	}
	
	public function verify(string $text, string $hash){
		if(hash('sha256', $text) == $hash)
			return true;
		else 
			return false;
	}
	
	public function show(){
		echo $this->render();
	}
}

	
$captcha = new PHPCaptcha('img/');
$captcha->setWidth(200);
$captcha->displayButton(true);
$captcha->show();

if(isset($_POST['verify'])){
	if($captcha->verify($_POST['input'], $_POST['hash']))
		echo "true";
	else
		echo "false";
}



?>

	