<?php

if(!empty($_POST['your_name'])){
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
}

?>

<!DOCTYPE html>
<meta charset="utf-8">
<head></head>
<body>

<form method="POST" action="input.php">
氏名
<input type="text" name="your_name">
<br>
<input type="checkbox" name="sports[]" value="baseball">野球
<input type="checkbox" name="sports[]" value="soccer">サッカー
<input type="checkbox" name="sports[]" value="tennis">テニス

<input type="submit" value="送信">

</body>
</html>