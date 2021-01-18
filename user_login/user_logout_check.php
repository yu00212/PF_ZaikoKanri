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
　<title>ログアウト</title>
</head>
<body>

<p>ログアウトしますか？</p>
<form action = "user_logout.php">
<input type = "button" onclick = "history.back()" value = "戻る">
<input type = "submit" value = "はい">
</form>

</body>
</html>
