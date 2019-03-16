<?php
// 文档地址：http://php.net/manual/zh/book.pdo.php

// PDO::__construct — 创建一个表示数据库连接的 PDO 实例
$dsn = 'mysql:dbname=php10;host=127.0.0.1';
$user = 'root';
$password = '123456';

try {
    $db = new PDO($dsn, $user, $password); // 数据库实例
    $time = time(); // 当前时间戳
    // 新增数据
    $create = "insert into msg (content, user, time) values ('内容', '名字', $time)";
    $db->exec($create);

    // 查询数据
    $select = "select * from msg order by id desc";
    $results = $db->query($select); // query 函数有返回结果集
    $rows = $results->fetchAll(); // 获取所有结果

    foreach ($rows as $row) {
        echo $row['user'] . ':' . $row['content'] . '<br>';
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}