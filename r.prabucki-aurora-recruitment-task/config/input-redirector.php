<?php 
//Input cleaning
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$get = $_GET;
$post = $_POST;
array_walk_recursive($post, function (&$v) {
	$v = filter_var(trim($v), FILTER_SANITIZE_ENCODED | FILTER_SANITIZE_STRING);
});

//Admin start
$system = new AdminDemoArticles();

//Data display
include_once PATH_FRONTEND . '_header.phtml';
switch ($get['mode']) {
	case 'edit'	:
		is_numeric($get['article_id']) ? $system->articleData = $system->getArticle($get['article_id']) : null;
		include_once PATH_FRONTEND . 'articlesForm.phtml'; 
		break;
	default	:
		$system->articlesData = $system->getArticleList();
		include_once PATH_FRONTEND . 'articles.phtml';
}
include_once PATH_FRONTEND . '_footer.phtml';

?>