<?php 
//Input cleaning
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$get = $_GET;
$post = $_POST;
array_walk_recursive($post, function (&$v) {
	$v = filter_var(trim($v), FILTER_SANITIZE_ENCODED | FILTER_SANITIZE_STRING);
});

//Input validating
spl_autoload_register (function ($className) {
    include_once 'GUMP/' . $className . '.php';
});
require_once "GUMP/gump.class.php";
$validator = new GUMP();

$GUMP_rules = array( 
'article_title' => 'required|max_len,250|min_len,3',
'article_description' => 'max_len,500|min_len,0',
'article_status' => 'integer|max_len,100|min_len,1',
'article_id' => 'integer|max_len,100|min_len,1');

$GUMP_filters = array( 
'article_title'    => 'trim|sanitize_string|ms_word_characters',
'article_description'    => 'trim|sanitize_string|ms_word_characters',
'article_status'    => 'trim|sanitize_numbers',
'article_id'    => 'trim|sanitize_numbers');

if(!empty($post['article_title'])){
	$post = $validator->sanitize($post);
	$post = $validator->filter($post, $GUMP_filters);
	$validated = $validator->validate($post, $GUMP_rules);
	if($validated !== TRUE){
	   $valitatorErrors = $validator->get_readable_errors();
	}
}
?>