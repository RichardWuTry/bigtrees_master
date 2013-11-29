<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    //首页 Index/index
    public function index(){
        $ArticleAction = new ArticleAction();
        if ($articles = $ArticleAction->getArticles(0)){
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
                where
                    article_id in (select
                                        article_id 
                                    from 
                                        article 
                                    where 
                                        is_active = 1
                                        and
                                        article_type = '访谈')
            ")) {
            $this->assign('tags', $tags);
        }
        $type = '访谈';
        $this->assign('type', $type);
        $this->display();
    }

    //先下活动
    public function event(){
        $type = '活动';
        $condition = "
                    and
                    article_type = '{$type}'
                    ";
        $ArticleAction = new ArticleAction();
        if ($articles = $ArticleAction->getArticles(0, $condition)){
            $this->assign('articles', $articles);                
        }
        $this->assign('type', $type);
        $this->display();        
    }

    //关于我们 Index/about
    public function about(){
        $this->display();
    }   
}
?>