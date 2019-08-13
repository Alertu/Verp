<?php
namespace app\index\controller;
use think\View;
use think\Controller;
class login extends Controller{
  public function index(){
   $view = new View();
    return $view->fetch('index');
  }
}
public function login($user_name='',$user_passwd=''){
   $user = User::get([
      'user_name' => $user_name,
      'user_passwd' => $user_passwd
      ]);
   if($user){
      echo '登录成功';
   }else{
        return $this->error('登录失败');
   }
  }
