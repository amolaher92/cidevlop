<?php

function createCaptcha()
{
	// Captcha configuration
	$config = array(
		'img_path' => realpath("") . '/assets/uploads/captcha_images/',
		'img_url' => base_url() . 'assets/uploads/captcha_images/',
		'font_path' => realpath("") . '/system/fonts/texb.ttf',
		'img_width' => 200,
		'img_height' => 80,
		'expiration' => 7200,
		'word_length' => 6,
		'font_size' => 25,
		'colors' => array(
			'background' => array(171, 194, 177),
			'border' => array(10, 51, 11),
			'text' => array(0, 0, 0),
			'grid' => array(185, 234, 237)
		)
	);
	$captcha = create_captcha($config);
	return $captcha;
}

// refresh captcha
function refreshCaptcha()
{
	// Captcha configuration
	$config = array(
		'img_path' => realpath('') . '/assets/uploads/captcha_images/',
		'img_url' => base_url() . 'assets/uploads/captcha_images/',
		'font_path' => realpath('') . '/system/fonts/texb.ttf',
		'img_width' => 200,
		'img_height' => 80,
		'expiration' => 7200,
		'word_length' => 6,
		'font_size' => 25,
		'colors' => array(
			'background' => array(171, 194, 177),
			'border' => array(10, 51, 115),
			'text' => array(0, 0, 0),
			'grid' => array(185, 234, 237)
		)
	);
	$captcha = create_captcha($config);
	// Unset previous captcha and set new captcha word
	// Display captcha image
	return $captcha;
}


