<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/*
 * 获取数据并将其转换成树型结构的递归函数
 * */
function getTree($data,$pid){
    if (!is_array($data) || empty($data) ) return false;
    $tree = array();
    foreach ($data as $k => $v){
        if($v['pid'] == $pid){ //当相等时，说明此数组为上个数组的子目录
            $v['pid'] = getTree($data,$v['id']);//将子数组的内容遍历后赋给上级数组的pid键，html页面上循环时用到此内容
            $tree[] = $v;
            unset($data[$k]);//删除遍历过的数组数据
        }
    }
    return $tree;
}
function getTime(){
    $time = time();
    $datetime = date("Y-m-d H:i:s",$time);
    return $datetime;
}