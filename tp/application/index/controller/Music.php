<?php
namespace app\index\controller;
use think\Controller;
use think\DB;
use think\Request;
class Music extends Controller
{
    public function getadd(){
       $res = DB::table("singer")->select();
       echo json_encode($res);
    }
}