<?php 
// Config initialization
require __DIR__ . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";
require PATH_CONFIG . DS . "input-cleaning.php";
!empty($valitatorErrors) ? die('Invalid Input Data') : null;
//System classes autoload
spl_autoload_register (function ($className) {
    include_once PATH_BACKEND . $className . '.php';
	//var_dump ($className);
});

//Admin start
$system = new AdminDemoArticles();

//Process requests
isset($post['create']) ? $system->setArticle($system->array_except($post, ['mode','create', 'update'])) : null;
isset($post['update']) ? $system->setArticle($system->array_except($post,['mode','create', 'update'])) : null;
isset($post['remove']) ? $system->deleteArticle($post['remove']) : null;

?>