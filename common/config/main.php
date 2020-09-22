<?php
return [

    'language'=> 'de-GE',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'catchAll' =>[
//        'site/offline',
//        'h' => 2,
    ],
    'controllerMap'=>[
//        'article'=>[
//            'class' => 'frontend\controllers\siteController',
//            'enableCsrfValidation'=>false,
//        ],
    ],
    'params'=>[
        'pic_size' =>['w'=>300,'h'=>200],
        'test'=>"test"
    ]

];
