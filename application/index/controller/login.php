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