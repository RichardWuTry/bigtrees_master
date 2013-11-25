<?php
class UserAction extends Action {
    public function logout() {
        clearSessionCookie();
        redirect(__URL__.'/login/');
    }
    
    public function login() {
        $this->display();
    }

    public function loginUser() {
        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = sha1($_POST['password']);
            
            $User = M('User');
            if ($currUser = $User->where("email = '$email' and password = '$password' and is_active = 1")
                                                    ->field("user_id, username, is_admin")
                                                    ->find()) {
                    $is_admin = $currUser['is_admin'];
                    setSessionCookie($currUser['user_id'], $currUser['username'], $is_admin, 1);
                    $this->success($is_admin);        
            } else {
                    $this->error('Email或密码有误');
            }
        }
    }
}
?>