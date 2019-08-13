<?php
namespace app\index\controller;
use think\View;
use think\Controller;
class Regist extends Controller{
  public function index(){
   $view = new View();
   return $view->fetch('index');
  }
}
//没有数据库用文件价代替
private static function set_php_file($filename, $content)
    {
        $fp = fopen($filename, "w+");
        if ($fp==false)
        {
            throw new Exception($fp);
        }
        fwrite($fp, "<?php exit();?>" . $content);
        fclose($fp);
    }

//
//用户注册
public function regist(){
  //实例化User
  $user = new User;
  //接收前端表单提交的数据
  $user->user_tel = input('post.UserTel');
  $user->user_passwd = input('post.UserPasswd');
  //进行规则验证
  $result = $this->validate(
      'tel' => $user->user_tel,
      'password' => $user->user_passwd,
    ],
    [
     
      'tel' => 'require',
      'password' => 'require',
    ]);
  if (true !== $result) {
    $this->error($result);
  }
  //写入数据库
  if ($user->save()) {
    return $this->success('注册成功');
  } else {
    return $this->success('注册失败');
  }
}