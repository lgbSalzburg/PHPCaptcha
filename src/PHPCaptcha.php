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
	private $standalone = false;
	
	public function __construct(string $path){
		$this->imagesDir = $path;
	}
	
	public function getRandomImage(){

	
	$images = glob($this->imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
	
	$randomImage = $images[array_rand($images)];
	
	return $randomImage;
	}
	
	public function getHash($randomImage){
		$hash = substr($randomImage, strlen($this->imagesDir), 64);
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
		$preview = "";

		if($this->standalone)
			$preview .= '<form method="post" style="display: inline;">';
		
		$preview .= '
		<img id="captchaImage" src="';
		
		$preview .= $this->image;
		$preview .= '" onContextMenu="return false;" style="width:'.$this->width.'px;">';
		$preview .= '
		<br>
		<div style="height: 0.5rem;"></div>
		<input id="captchaInput" style="display: inline; width:'.$this->width.'px;" name="input" type="text" required>
		
		<div style="height: 0.5rem;"></div>
		<input style="display:none;" name="hash" type="text" value="';
		$preview .= $this->getHash($this->image);
		$preview .= '">';

		if($this->button)
			$preview .= '<input id="captchaButton" name="verify" type="submit" value="verify">
			<div style="height: 0.5rem;"></div>';
		
		if($this->standalone)
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

	public function setStandalone($bool){
		$this->standalone = $bool;
	}

	public function getPath(){
		return $this->imagesDir;
	}
}

?>

	