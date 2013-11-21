<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$Article = M('Article');
    	if ($articles = $Article->where('is_active=1')
    							->order('priority desc, posted_at desc')
    							->limit(0,8)
    							->select()) {
    		foreach ($articles as &$a) {
    			$a['tag_list'] = explode(',', $a['tags']);
    		}
    		$this->assign('articles', $articles);
    	}

		$this->display();
    }
}
?>