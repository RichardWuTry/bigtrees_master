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

    public function listInterview() {
        if (isset($_GET['tag'])) {
            $tag = $_GET['tag'];
            $Model = M();
            $row_cnt = C('IndexAction.per_page_count');
            if($articles = $Model->query("
                select
                    *
                from
                    article
                where
                    article_id in (select distinct article_id from tag where tag_name = '{$tag}')
                    and
                    is_active = 1
                order by
                    priority desc, posted_at desc
                limit
                    0,{$row_cnt};
                ")){
                foreach ($articles as &$a) {
                    $a['tag_list'] = explode(',', $a['tags']);
                }
                $this->assign('articles', $articles);
            }
            $this->assign('tag', $tag);
            $this->display();
        }
    }
}
?>