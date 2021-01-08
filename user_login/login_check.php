<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/common.css">
<title>ログイン</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');
require_once('../sanitize/sanitize.php');
$post=sanitize($_POST);

if (!empty($post['email']))
{
  $user_email=$post['email'];
}

if (!empty($post['pass']))
{
  $user_pass=$post['pass'];
}

if(isset($user_pass))
{
  $user_pass=md5($user_pass);
}

try
{
  $sql='SELECT name FROM users WHERE email=? AND password=?';
  $stmt=connect()->prepare($sql);
  $data[]=$user_email;

  if(isset($user_pass))
  {
    $data[]=$user_pass;
  }

  $stmt->execute($data);
  $dbh=null;
  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  if($rec==false)
  {
    print'メールアドレスかパスワードが間違っています。<br />';
    print'<a href="login_form.html">戻る</a>';
  }
  else
  {
    session_start();
    $_SESSION['login']=1;
    $_SESSION['user_email']=$user_email;
    $_SESSION['user_pass']=$user_pass;
    $_SESSION['user_name']=$rec['name'];
    header('Location:../public/list.php');
    exit();
  }
}
catch(Exception $e)
{
  echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
  print'ただいま障害により大変ご迷惑お掛けしております。';
  exit();
}
?>

</body>
</html>

