<!DOCTYPE html>
<html lang = "ja">
<head>
　<meta charset = "UTF-8">
　<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
　<link rel = "stylesheet" href = "../public/css/common.css">
　<title>ユーザー登録</title>
</head>
<body>

<p>全ての項目を入力後「登録」を押してください。</p>
<p>※登録内容はログイン時に必要になります。<br>　メモしておいてください。</p>


  <form method = "post" action = "user_add_check.php">

  <p>
    <label for = "name">ユーザー名：</label> <!-- label->フォームと項目名を関連付ける-->
    <input type = "text" name = "name" style = "width:200px">
  </p>

  <p>
    <label for = "email">メールアドレス：</label>
    <input type = "email" name = "email"> <!-- type->部品の形式 -->
  </p>

  <p>
    <label for = "pass">パスワード：</label>
    <input type = "password" name = "pass">
  </p>

  <p>
    <label for = "pass2">パスワード再入力：</label>
    <input type = "password" name = "pass2">
  </p>

    <input type = "button" onclick = "history.back()" value = "戻る">
    <input type = "submit" value = "登録">
  </form>

</body>
</html>

