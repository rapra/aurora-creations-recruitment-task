<?php

// ERROR REPORTING
error_reporting(E_ALL & ~E_NOTICE);

//DATABASE CONFIG
define('DB_HOST', 'localhost');
define('DB_NAME', 'rprabucki-php-developer');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASS', '');

// FILE PATH
define('DS', DIRECTORY_SEPARATOR);
define('PATH_CONFIG', __DIR__); 
define('PATH_ROOT', str_replace('config','', PATH_CONFIG));
define('PATH_BACKEND', PATH_ROOT . "backend" . DS);
define('PATH_FRONTEND', PATH_ROOT . "frontend" . DS);

//ARTICLE STATUS
	// TODO migrate to database
define('ARTICLE_STATUS',array( 0 => 'Disabled', 1 => 'Enabled', 2 => 'Archived' ));
define('ARTICLE_CATEGORY',array( 0 => 'Disabled', 1 => 'Enabled', 2 => 'Archived' ));

// FORM VALIDATION DEFINISIONS FOR GUMP VALIDATOR
/*
define('ARTICLE_FORM_RULES',[
    'article_title' => ['required', 'alpha_numeric','between_len' => [5, 200]],
    'article_description' => ['alpha_numeric', 'between_len' => [5, 500]],
    'avatar'   => ['required_file', 'extension' => ['png', 'jpg']]
]);
define('ARTICLE_FORM_MESSAGES',[
    'article_title' => ['required' => 'Fill the Article title field please'],
    'password' => ['between_len' => '{field} must be between {param[0]} and {param[1]} characters.'],
    'avatar'   => ['extension' => 'Valid extensions for avatar are: {param}'] // "png, jpg"
]);
*/

?>