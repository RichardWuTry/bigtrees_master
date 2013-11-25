<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    //首页 Index/index
    public function index(){
        $this->displayArticles(0);
    }

    public function nextPage(){
        if ($this->isPost()) {
            $start_row_no = $_POST['start_row_no'];
            $this->displayArticles($start_row_no);   
        }
    }

    private function displayArticles($start_row_no){
        $Article = M('Article');
        if ($articles = $Article->where('is_active=1')
                                ->order('priority desc, posted_at desc')
                                ->limit($start_row_no,C('IndexAction.per_page_count'))
                                ->select()) {
            foreach ($articles as &$a) {
                $a['tag_list'] = explode(',', $a['tags']);
            }
            $this->assign('articles', $articles);
        }
        $this->display();
    }

    //关于我们
    public function about(){
        $this->display();
    }
}
?>