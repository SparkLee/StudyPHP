<?php
$arr = array(
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
                'file' => 'D:\www\spk\GitHub-SparkLee\StudyPHP\Log4php2.3.0\test\logs\test.log',
                'append' => true
            )
        )
    )
);

return $arr;