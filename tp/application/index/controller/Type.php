<?php
namespace app\index\controller;
use think\Controller;
use think\DB;
use think\Request;
class Type extends Controller
{
    // 查看类别加载页面
    public function getIndex(Request $request){
        // echo 123;
        $id = $request->param('id', 0);
        $row = DB::table('type')->where('pid',$id)->field('id,tname,status')->select();
        foreach ($row as $k => $v) {
            $c = DB::table('type')->where('pid', $v['id'])->count();
            // dump($c);
            $row[$k]['erzi'] = $c;
        }
        // dump($row);
        // die();
		echo json_encode($row);
    }
    
    // 添加类别
    public function getadd(Request $request){
        $res = DB::table('type')->select();
        echo json_encode($res);
    }
    //处理添加的方法
    public function getAdddo(Request $request)
    {
        $get = $request->except(["action"]);
        $pid = $get['pid'];
        $k = DB::table("type")->where("tname","$pid")->find();
        if($k['pid']==0){
            $get["pid"] = $k['id'];
        }else{
            $get["pid"] = $k['pid'];
        }
        
        if ($get['pid'] == 0) {
            $get['path'] = '0,';
        } else {
            $die = DB::table('type')->where('id', $get['pid'])->find();
            $get['path'] = $die['path'] . $die['id'] . ',';
        }
        $res = DB::table('type')->insert($get);
        if ($res) {
            echo '{"code":"200","msg":"添加成功"}';
        } else {
            echo '{"code":"100","msg":"添加失败"}';
        }
    }

    // 删除类别
    public function getDel(Request $request)
    {
        $id = $request->param('id');
        $res = DB::table('type')->where('id', $id)->find();
        if ($res['pid'] == 0) {
            echo '{"code":"300","msg":"删除失败"}';
            die();
        } else {
            $res = DB::table('type')->delete($id);
            if ($res) {
                echo '{"code":"200","msg":"删除成功"}';
            } else {
                echo '{"code":"100","msg":"删除失败"}';
            }
        }
    }
    // 修改类别
    public function getEdit(Request $request)
    {
        $get = $request->param('id');
        // dump($get);
        // die();
        $res = DB::table('type')->select($get);
        echo json_encode($res); 
    }

    // 处理修改类别的方法
    public function getEditdo(Request $request)
    {
        $get = $request->except(["action"]);
        $id = $get['id'];
        // dump($id);
        $row = DB::table('type')->find($id);
        $row['tname'] = $get['tname'];
        $res = DB::table('type')->where('id', $id)->update($row);
        if ($res) {
            echo '{"code":"200","msg":"修改成功"}';
        } else {
            echo '{"code":"200","msg":"修改失败"}';
        }
    }
}