<?php

require 'db_connection.php';

//ユーザ入力なし query
$sql = 'select * from contacts where id = 1'; //sql
$stmt = $pdo->query($sql); //sql実行　ステートメント

$result = $stmt->fetchall();

echo '<pre>';
var_dump($result);
echo '</pre>';
