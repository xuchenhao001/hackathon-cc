<?php
return array(
    'URL_MODEL'=>2,
    'DEFAULT_MODULE'        =>  'home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
	//'配置项'=>'配置值'
    'name'=>'bit',
    'default_return_type'=>'json',

    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'mysql428.sl-aus-syd-1-data.2.dblayer.com',
    'DB_NAME'=>'compose',
    'DB_USER'=>'admin',
    'DB_PWD'=>'MNYWHUGUYVMGCHWG',
    'DB_PORT'=>'15671',
    'DB_PREFIX'=>'bit_',

    'response_exit'=>false,
    'log'=>array(
        'type'=>'trace',
        'trace_file'=>THINK_PATH.'tpl/page_trace.tpl',
    ),
    'URL_ROUTER_ON'=>true,
    'URL_ROUTE_RULES'=>array(

    ),
    //session
    'session'=>array(
        'prefix'=>'bit',
        'type'=>'',
        'var_session_id' => '',
        'auto_start'=>true),

);
