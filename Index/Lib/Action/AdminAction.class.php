<?php
class AdminAction extends Action {
    function __construct() {
        parent::__construct();
        if (!isLogin() || !isAdmin()) {
            redirect(__APP__.'/User/login/');
        }
    }

    public function listArticle() {
        $this->assign('username', $_SESSION[APP_PREFIX.'user_name']);
        $Article = M("Article");
        if ($articles = $Article->order('priority desc, posted_at desc')
                                ->select()){
            $this->assign('articles', $articles);
        }
        $this->display();
    }

    public function newArticle() {
        $this->assign('username', $_SESSION[APP_PREFIX.'user_name']);
        $this->display();
    }

    public function addArticle() {
        if ($this->isPost()) {
            $Article = D("Article");
            if ($Article->create()){
                $tag_string = $Article->tags;
                if($article_id = $Article->add()){
                    foreach (split(",",$tag_string) as $key => $tag) {
                        $data[$key]['article_id'] = $article_id;
                        $data[$key]['tag_name'] = $tag;
                    }
                    $Tag = M("Tag");
                    if ($Tag->addAll($data)){
                        $this->success();
                    } else {
                        $this->error($Tag->getError());
                    }
                 }
            }
            $this->error($Article->getError());
        }    	
    }

    public function modifyArticle() {
        
    }

    public function updateArticle() {

    }
}
?>