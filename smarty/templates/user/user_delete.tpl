<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../public/css/common.css">
  <title>ユーザー削除</title>
</head>
<body>

  <p>名前：{$user_name}</p>
  <p>メールアドレス：{$user_email}</p>
  <p>上記のアカウントを削除してもよろしいでしょうか？</p>

  <form method = "post" action = "user_delete_done.php">
    <input type = "hidden"name = "user_id" value = "{$user_id}">
    <input type = "button" onclick = "history.back()" value = "戻る">
    <input type = "submit" value = "ＯＫ">
  </form>

</body>
</html>
