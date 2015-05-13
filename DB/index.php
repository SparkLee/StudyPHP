<?php
header("Content-type: text/html; charset=utf-8");
try {
    $pdo = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', '');//http://php.net/manual/zh/pdo.construct.php
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$pdo->query("SET NAMES UTF8");

//MySQL只有InnoDB支持事务处理（如果事务执行无效，请检查事务中涉及到的相应数据表的表类型是否为InnoDB）
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction();
    
    $pdo->exec("INSERT INTO user(name, age, gender) VALUE('LiWei', 26, 1);");
    $pdo->exec("INSERT INTO user(name, age, gender) VALUE('LiWei', 26, 1);");
    $pdo->exec("INSERT INTO user(name, age, gender) VALUE('LiWei', 26, 1);");
    $pdo->exec("INSERT INTO user(name, age, gender) VALUE('LiWei', 26, 1);");
    $pdo->exec("INSERT INTO user(name, age, gender) VALUE('LiWei', 26, 1);");
    $pdo->exec("INSERT INTO user(name, age, gender) VALUE('LiWei', 26, 1);");
    throw new Exception("定制的异常。");
    $pdo->exec("INSERT INTO user(name, age, gender) VALUE('ChineseMan', 26, 1);");
    
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "数据库操作失败: " . $e->getMessage();
}