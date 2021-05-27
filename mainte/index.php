<?php

require 'db_connection.php';

//ユーザ入力なし query
// $sql = 'select * from contacts where id = 1'; //sql
// $stmt = $pdo->query($sql); //sql実行　ステートメント

// $result = $stmt->fetchall();

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

//ユーザ入力あり prepare, bind, execute 悪意ユーザ delete * など SQLインジェクション
$sql = 'select * from contacts where id = :id'; //名前付きプレースホルダー
$stmt = $pdo->prepare($sql); //プリペアードステートメント
$stmt->bindValue('id', 1, PDO::PARAM_INT); //紐付け
$stmt->execute(); //実行

$result = $stmt->fetchAll(); //中のデータを取得

echo '<pre>';
var_dump($result);
echo '</pre>';

$pdo->beginTransaction();

try{

    //sql処理
    $stmt = $pdo->prepare($sql); //プリペアードステートメント
    $stmt->bindValue('id', 1, PDO::PARAM_INT); //紐付け
    $stmt->execute(); //実行

    $pdo->commit();

}catch(PDOException $e){
    $pdo->rollBack(); //更新のキャンセル
}