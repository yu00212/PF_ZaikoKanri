<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel = "stylesheet" href = "../public/css/common.css">
<title>ユーザー登録</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');
require_once('../sanitize/sanitize.php');
$post = sanitize($_POST);

$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_pass = $_POST['pass'];

try
{
  $sql = 'INSERT INTO users (name,email,password) VALUES (?,?,?)';
  $stmt = connect()->prepare($sql);
  $data[] = $user_name;
  $data[] = $user_email;
  $data[] = $user_pass;
  $stmt->execute($data);

  $dbh = null;

  print $user_name;
  print 'さんを登録しました。<br />';

}
catch (Exception $e)
{
	echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<form action = "../user_login/login_form.html">
<input type = "submit" value = "ログイン画面へ">
</form>

</body>
</html>
