<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()]) == true)
{
  setcookie(session_name(),'',time()-4200,'/');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
　<meta charset = "UTF-8">
　<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
　<link rel = "stylesheet" href = "../public/css/common.css">
　<title>ログアウト</title>
</head>
<body>

  <p>ログアウトしました。</p>
  <form action = "./login_form.html">
    <input type = "submit" value = "ログイン画面へ">
  </form>

</body>
</html>
