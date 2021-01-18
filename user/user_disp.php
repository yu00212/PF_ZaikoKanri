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
　<title>ユーザー情報</title>
</head>
<body>

<?php

require_once('../db_connect/db_connect.php');
$user_id = $_GET['user_id'];

try
{
$sql = 'SELECT name,email FROM users WHERE id = ?';
$stmt = connect()->prepare($sql);
$data[] = $user_id;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$user_name = $rec['name'];
$user_email = $rec['email'];
$dbh = null;
}
catch(Exception $e)
{
  echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

if(isset($user_name))
{
  print '名前：';
	print $user_name;
	print '<br />';
}

if(isset($user_email))
{
  print 'メールアドレス：';
	print $user_email;
  print '<br />';
  print '<br />';
}

print '<form>';
print '<input type = "button" onclick = "history.back()" value = "戻る">';
print '</form>';

?>
</body>
</html>
