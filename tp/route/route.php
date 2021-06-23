<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------



Route::get('/', 'index/index/index');
// 个人中心模块
// // 前台注册
Route::controller('zc','index/Zc');
// // 登录
// Route::controller('user', 'index/Zc');
// -------------------------******************后台路由---------------------------------
// 后台类别
Route::controller("type",'index/Type');
// 后台音乐
Route::controller("music",'index/Music');
// 后台专辑
Route::controller("zj",'index/Zj');







