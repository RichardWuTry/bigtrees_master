<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    //首页 Index/index
    public function index(){
        $this->displayArticles(0);
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
            $start_row_no = $_POST['start_row_no'];
            $this->displayArticles($start_row_no, $condition);   
        }
    }

    public function displayArticles($start_row_no, $condition=''){
        $Model = M();
        $row_cnt = C('IndexAction.per_page_count');
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
                $this->assign('articles', $articles);
        }
        $this->display();
    }

    //访谈分类 Index/interview
    public function interview(){
        $Model = M();
        if ($tags = $Model->query("
                select distinct
                    tag_name
                from
                    tag
            ")) {
            $this->assign('tags', $tags);
        }
        $this->display();
    }

    //关于我们 Index/about
    public function about(){
        $this->display();
    }
}
?>