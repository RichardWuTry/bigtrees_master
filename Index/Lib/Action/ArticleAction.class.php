<?php
class ArticleAction extends Action {
    public function showDetail(){
    	if (isset($_GET['id'])) {
    		$article_id = $_GET['id'];
    		echo $article_id;
    	}
    }
}
?>