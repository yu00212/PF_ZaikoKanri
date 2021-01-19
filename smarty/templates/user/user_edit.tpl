<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../public/css/common.css">
  <link rel = "stylesheet" href = "../public/css/list.css">
  <title>アカウント編集</title>
</head>
<body>

  <form method = "post" action = "user_edit_check.php">
    <input type = "hidden" name = "user_id" value = "{$user_id}">
    <p>名前<font color = "red">※</font>：<input type = "text" name = "name" style = "width:200px" value = "{$user_name}" required></p>
    <p>メールアドレス<font color = "red">※</font>：<input type = "email" name = "email" style = "width:200px" value = "{$user_email}" required></p>
    <p>パスワード<font color = "red">※</font>：<input type = "password" name = "pass" style = "width:200px" required></p>
    <p>パスワード再入力<font color = "red">※</font>：<input type = "password" name = "pass2" style = "width:200px" required></p>
    <input type = "button" onclick = "history.back()" value = "戻る">
    <input type = "submit" value = "ＯＫ">
  </form>

</body>
</html>
