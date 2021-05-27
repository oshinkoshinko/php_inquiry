<?php

//DB接続 PDO
require 'db_connection.php';

//入力 DB保存 prepare, execute(配列(全て文字列))

$params = [
    'id' => null,
    'your_name' => '名前',
    'email' => 'oka@oka.com',
    'url' => 'http://oka.com',
    'gender' => '1',
    'age' => '2',
    'contact' => 'いいね',
    'created_at' => null
];

$count = 0;
$columns = '';
$values = '';

//array_keysで連想配列のkeyを取得
foreach(array_keys($params) as $key){
    //先頭以外コンマを付ける
    if($count++>0){
        $columns .= ',';
        $values .= ',';
    }
    //コンマをつけた(または先頭の)カラムにkeyを結合
    $columns .= $key;
    $values .= ':'.$key;
}

$sql = 'insert into contacts ('. $columns .')values('. $values .')';

var_dump($sql);

$stmt = $pdo->prepare($sql); //プリペアードステートメント
$stmt->execute($params); //実行