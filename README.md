# PHPCaptcha
[![wakatime](https://wakatime.com/badge/github/lgbSalzburg/PHPCaptcha.svg)](https://wakatime.com/badge/github/lgbSalzburg/PHPCaptcha)

PHPCaptcha is a PHP library for easy Implementations of captchas.

A captcha is a completely automated public Turing test to tell computers and humans apart.

## Install

## Generate Images
To generate the images, just run create.py or loop.py with the number of images you want to generate.

(If you have not added the python lib [**_Pillow_**](https://pillow.readthedocs.io/en/stable/) just run install.py or get it from the [official page](https://pillow.readthedocs.io/en/stable/installation.html).)

These images will be saved in the *img/* folder in the same directory as the create.py file.
The file name of the images is the text displayed on them hashed with *sha256*

## Place on website
To place the captcha on your website you need to do the following steps:
1. Import [*PHPCaptcha.php*](src/PHPCaptcha.php) into the namespace (this has to be **before** initiating the object)
```php
include 'PHPCapcha.php';
```
2. Create a PHPCaptcha object with the path to the folder where the captcha images are stored as argument
```php
$captcha = new PHPCaptcha('img/');
```
3. (Set the width of the image in px) 
```php
$captcha->setWidth(200);
```
 This is only necessary if you want to change the with of the image which is set to 300px by default.

4. To display the captcha use the *show()* function in the place you want it to be displayed
```php
$captcha->show();
```
## Requirements


