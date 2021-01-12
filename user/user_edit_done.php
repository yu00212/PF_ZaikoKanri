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
<title>ユーザー修正</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');
require_once('../sanitize/sanitize.php');
$post = sanitize($_POST);

if(!empty($_POST['user_id']))
{
  $user_id = $_POST['user_id'];
}

if(!empty($_POST['name']))
{
  $user_name = $_POST['name'];
}

if(!empty($_POST['email']))
{
  $user_email = $_POST['email'];
}

if(!empty($_POST['pass']))
{
  $user_pass = $_POST['pass'];
}

try
{
$sql = 'UPDATE users SET name = :name, email = :email, password = :pass WHERE id = :user_id';
$stmt = connect()->prepare($sql);

if(isset($user_id))
{
  $data[':user_id'] = (int)$user_id;
}

if(isset($user_name))
{
  $data[':name'] = $user_name;
}

if(isset($user_email))
{
  $data[':email'] = $user_email;
}

if(isset($user_pass))
{
  $data[':pass'] = $user_pass;
}

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

<p>修正しました。</p>
<br>
<form action = "../public/list.php">
<input type = "submit" value = "ホーム画面へ">
</form>

</body>
</html>
