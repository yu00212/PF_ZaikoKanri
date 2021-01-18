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

?>

<p>名前：<?php print $user_name;?></p>
<p>メールアドレス：<?php print $user_email;?></p>
<p>上記のアカウントを削除してもよろしいでしょうか？</><br />

<form method = "post" action = "user_delete_done.php">
<input type = "hidden"name = "user_id" value = "<?php print $user_id; ?>">
<input type = "button" onclick = "history.back()" value = "戻る">
<input type = "submit" value = "ＯＫ">
</form>

</body>
</html>
