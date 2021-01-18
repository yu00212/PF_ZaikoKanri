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
　<title>ユーザー削除</title>
</head>
<body>

<?php

require_once('../db_connect/db_connect.php');
$user_id = $_POST['user_id'];

try
{
$sql = 'DELETE FROM users WHERE id = ?';
$stmt = connect()->prepare($sql);
$data[] = $user_id;
$stmt->execute($data);
$dbh = null;
}
catch (Exception $e)
{
  echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<p>削除しました。</p><br>
<br>
<form action = "../public/list.php">
<input type = "submit" value = "在庫一覧へ">
</form>

</body>
</html>
