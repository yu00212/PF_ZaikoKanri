<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/common.css">
<title>ユーザー修正</title>
</head>
<body>

<?php

require_once('../db_connect/db_connect.php');
$user_id=$_GET['userid'];

try
{
$sql='SELECT name,email FROM users WHERE id=?';
$stmt=connect()->prepare($sql);
$data[]=$user_id;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$user_name=$rec['name'];
$user_email=$rec['email'];
$dbh=null;
}
catch(Exception $e)
{
  echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<form method="post" action="user_edit_check.php">
<input type="hidden"name="userid" value="<?php print $user_id; ?>">
<p>名前：<input type="text" name="name" style="width:200px" value="<?php print $user_name; ?>"></p>
<p>メールアドレス：<input type="email" name="email" style="width:200px" value="<?php print $user_email; ?>"></p>
<p>パスワード：<input type="password" name="pass" style="width:200px"></p>
<p>パスワード再入力：<input type="password" name="pass2" style="width:200px"></p>
<br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

</body>
</html>
