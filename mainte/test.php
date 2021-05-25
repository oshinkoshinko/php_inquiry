<?php

//パスを記録したファイルの場所
echo __FILE__;
// Applications/MAMP/htdocs/php_test/mainte/test.php
echo '<br>';
//パスワード暗号化
echo password_hash('password123', PASSWORD_BCRYPT);
echo '<br>';

$contactFile = '.contact.dat';
// $fileContents = file_get_contents($contactFile);
// echo $fileContents

//書き込む
// file_put_contents($contactFile, 'テストです')

// $addText = 'テストです' . "\n";
// //追記
// file_put_contents($contactFile, $addText, FILE_APPEND);

//fileで配列へ explodeで,区切り foreachで抽出

// $allData = file($contactFile);
// foreach($allData as $lineData){
//     $lines = explode(',', $lineData);
//     echo $lines[0]. '<br>';
//     echo $lines[1]. '<br>';
//     echo $lines[2]. '<br>';
// }

$contents = fopen($contactFile, 'a+');
$addText = '1行追記' . "\n";
fwrite($contents, $addText);
fclose($contents);

?>