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

    public function showList() {
        if (isset($_GET['tag']) && isset($_GET['type'])) {
            $tag = $_GET['tag'];
            $type = $_GET['type'];
            $condition = "
                        and
                        article_id in (select article_id from tag where tag_name = '{$tag}')
                        ";
            $condition = $condition."
                        and
                        article_type = '{$type}'
                        "; 
            if ($articles = $this->getArticles(0, $condition)){
                $this->assign('articles', $articles);
            }
            $this->assign('type',$type);
            $this->assign('tag', $tag);
            $this->display();
        }
    }

    public function nextPage(){
        if ($this->isPost()) {
            $condition = '';
            if (isset($_GET['tag'])) {
                $tag = $_GET['tag'];
                $condition = $condition."
                            and
                            article_id in (select article_id from tag where tag_name = '{$tag}')
                            ";
            }
            if (isset($_GET['type'])) {
                $type = $_GET['type'];
                $condition = $condition."
                            and
                            article_type = '{$type}'
                            ";
            }
            $start_row_no = $_POST['start_row_no'];
            $ArticleAction = new ArticleAction();
            if ($articles = $ArticleAction->getArticles($start_row_no, $condition)){
                $this->assign('articles', $articles);                
            }
            $this->display();
        }
    }

    //公共方法
    public function getArticles($start_row_no, $condition=''){
        $Model = M();
        $row_cnt = C('per_page_count');
        if ($articles = $Model->query("
                select
                    *
                from
                    article
                where
                    is_active = 1
                    {$condition}
                order by
                    priority desc, posted_at desc
                limit
                    {$start_row_no},{$row_cnt}
            ")) {
                foreach ($articles as &$a) {
                    $a['tag_list'] = explode(',', $a['tags']);
                }
                return $articles;
        }
        return false;
    } 
}
?>