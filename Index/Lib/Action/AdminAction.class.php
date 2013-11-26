<?php
class AdminAction extends Action {
    function __construct() {
        parent::__construct();
        if (!isLogin() || !isAdmin()) {
            redirect(__APP__.'/User/login/');
        }
    }

    public function listArticle() {
        if (isset($_GET['p'])) {
            $p = $_GET['p'];
        } else {
            $p = 1;
        }
        $this->assign('username', $_SESSION[APP_PREFIX.'user_name']);
        $Article = M("Article");
        if ($articles = $Article->order('priority desc, posted_at desc')
                                ->limit(($p-1)*30, 30)
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
        if (isset($_GET['id'])) {
            $article_id = $_GET['id'];
            $Article = M('Article');

            if ($article = $Article->where('article_id='.$article_id)
                                    ->find()) {
                $this->assign('article',$article);
            }
            $this->assign('username', $_SESSION[APP_PREFIX.'user_name']);
            $this->display();
        }
    }

    public function updateArticle() {
        if ($this->isPost()) {
            $Article = M("Article");
            if ($Article->create()){
                $article_id = $Article->article_id;
                $tag_string = $Article->tags;
                if($Article->save()){                    
                    foreach (split(",",$tag_string) as $key => $tag) {
                        $data[$key]['article_id'] = $article_id;
                        $data[$key]['tag_name'] = $tag;
                    }
                    $Tag = M("Tag");
                    $Tag->where('article_id='.$article_id)
                        ->delete();
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
}
?>