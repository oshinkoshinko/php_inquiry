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

//トランザクション　まとめて処理 beginTransaction, commit, rollback
//ex)銀行　残高を確認->Aさんから引き落とし->Bさんに振り込み Aさんから引き落とした後に通信が遮断されたら困る！

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