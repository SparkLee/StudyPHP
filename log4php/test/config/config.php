<?php
$config = array(
    'rootLogger' => array(
        'appenders' => array(
            'default'
        )
    ),
    'appenders' => array(
        'default' => array(
            'class' => 'LoggerAppenderFile',
            'layout' => array(
                'class' => 'LoggerLayoutSimple'
            ),
            'params' => array(
                'file' => 'D:\www\php\spk\GitHub-SparkLee\StudyPHP\log4php\test\log\myLog-php.log',
                'append' => true
            )
        )
    )
);

return $config;