<?php
header("Content-type: text/html; charset=utf-8");
try {
    $pdo = new PDO('mysql:dbname=testdb;host=127.0.0.1', 'root', '');//http://php.net/manual/zh/pdo.construct.php
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$pdo->query("SET NAMES UTF8");

/*
try { //注：因MYSQL的MyISAM引擎不支持事务处理。故，如果表的表类型[引擎]为MyISAM时，事务将失效，同不使用事务一样。
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction();
    
    $pdo->exec("INSERT INTO student(name, age) VALUE('中国人', 26)");
    $pdo->exec("INSERT INTO student(name, age) VALUE('中国人', 26)");
    throw new Exception();
    $pdo->exec("INSERT INTO student(name, age) VALUE('中国人', 26)");
    
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "数据库操作失败: " . $e->getMessage();
}*/

$i = 10000000;
while ($i > 0) {
    $i--;
    $pdo->exec("INSERT INTO student(name, age) VALUE('中国人', 26)");
    echo $i;
}
