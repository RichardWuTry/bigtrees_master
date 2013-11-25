<?php
class AdminAction extends Action {
    function __construct() {
        parent::__construct();
        if (!isLogin() || !isAdmin()) {
            redirect(__APP__.'/User/login/');
        }
    }

    public function listArticle() {
/*        if (isset($_GET['start_row_no'])) {
            $start_row_no = $_GET['start_row_no'];
        } else {
            $start_row_no = 0;
        }
        $Article = M('Article');
        if ($articles = $Article->order('priority desc, posted_at desc')
                                ->limit($start_row_no,8)
                                ->select()) {
            foreach ($articles as &$a) {
                $a['tag_list'] = explode(',', $a['tags']);
            }
            $this->assign('articles', $articles);
        }

        $this->display();*/
    }

    public function newArticle() {
        $this->assign('username', $_SESSION[APP_PREFIX.'user_name']);
        $this->display();
    }

    public function addArticle() {
        if ($this->isPost()) {
            $Article = D("Article");
            if ($Article->create()){
                if($article_id = $Article->add()){
                    $sql = "insert into 
                                tag
                                (
                                    article_id,
                                    tag_name
                                )
                            values
                                ";
                    foreach(split(",",$Article->tags) as $t){
                        $sql=$sql."(".$article_id.",".$t."),";
                    }
                    $sql = rtrim($sql,",");
                    $Model = M();
                    if ($Model->execute($sql)){
                        $this->success();
                    } else {
                        $this->error($Model->getError());
                    }
                }
            }
            $this->error($Article->getError());
        }    	
    }

    public function updateArticle() {

    }
}
?>