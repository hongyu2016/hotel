<?php
//配置文件
return [
    'view_replace_str'  => array(
        '__CSS__' => '/static/admin/css',
        '__JS__' => '/static/admin/js',
        '__EXTEND__' => '/static/admin/extend',
        '__web_root__' => '/static/admin',
        'admin_index' =>'/thinkphp_test1/public/index.php'
    ),
    'session' => [
        'auto_start' => true,
        'expire' => 1800, /*时间长度*/
    ],

];