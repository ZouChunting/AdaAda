<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址（即本地）
	'DB_NAME'   => 'adada', // 数据库名（自定义）
	'DB_USER'   => 'root', // 用户名（自定义）
	'DB_PWD'    => '', // 密码（自定义）
	'DB_PORT'   => 3306, // 端口（默认）
	'DB_PARAMS' =>  array(), // 数据库连接参数
	'DB_PREFIX' => 'ada_', // 数据库表前缀（自定义）
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
);