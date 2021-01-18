<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
　<meta charset = "UTF-8">
　<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
　<link rel = "stylesheet" href = "../public/css/common.css">
　<title>アカウント一覧</title>
</head>
<body>

<?php

require_once('../db_connect/db_connect.php');

try
{
  $sql = 'SELECT id,name FROM users WHERE 1';
  $stmt = connect()->prepare($sql);
  $stmt->execute();

  $dbh = null;

  print 'アカウント一覧<br />';

  print '<form method = "post" action = "user_branch.php">';

  while(true)
  {
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec == false)
    {
      break;
    }
    print'<input type = "radio" name = "user_id" value = "'.$rec['id'].'">';
    print $rec['name'];
    print'<br />';
  }

  print'<input type = "submit" name = "disp" value = "参照">';
  print'<input type = "submit" name = "add" value = "追加">';
  print'<input type = "submit" name = "edit" value = "修正">';
  print'<input type = "submit" name = "delete" value = "削除">';
  print'</form>';

}
catch (Exception $e)
{
  echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<br>
<input type = "button" onclick = "history.back()" value = "戻る">

</body>
</html>
