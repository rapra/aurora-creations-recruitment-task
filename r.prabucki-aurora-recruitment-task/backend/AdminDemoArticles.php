<?php declare(strict_types=1);

class AdminDemoArticles extends AdminDemoBase{	
	
	//Variables
	public $articlesData = null, $articleData = null;
	
	// Constructor
	public function __construct(){
		parent::__construct();
	}

	// Get articles list
	function getArticleList () {
		$sql = "SELECT * FROM tbl_articles ;";
		return $this->dbRequest($sql);		
	}
	
	// Get single article
	function getArticle (int $articleId) {
		//var_dump($articleId);
		$sql = "SELECT * FROM tbl_articles WHERE article_id=:article_id ;";
		return $this->dbRequest($sql, $articleId);		
	}
	
	// Insert / update single article
	function setArticle ($params) {
		//var_dump($params);
		$sql = $params['article_id'] ? 
			"UPDATE tbl_articles SET article_title=:article_title, article_description=:article_description, article_status=:article_status WHERE article_id=:article_id ;"
			:
			"INSERT INTO tbl_articles (article_title, article_description, article_status) VALUES (:article_title,:article_description, :article_status) ;";
		return $this->dbRequest($sql, $params);		
	}
	
	// Delete single article
	function deleteArticle (int $articleId) {
		$sql = "DELETE FROM tbl_articles WHERE article_id=:article_id ;";
		return $this->dbRequest($sql, $articleId);		
	}

}

?>