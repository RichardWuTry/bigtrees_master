<?php
class ArticleAction extends Action {
    public function showDetail() {
    	if (isset($_GET['id'])) {
    		$article_id = $_GET['id'];
    		$Article = M('Article');

    		if ($a = $Article->where('article_id='.$article_id)
    								->find()) {
    			$a['tag_list'] = explode(',', $a['tags']);
    			$this->assign('article',$a);
    		}
    		$this->display();
    	}
    }
}
?>