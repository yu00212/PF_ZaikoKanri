<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
</head>

<body>

    <p>名前：{$user_data['name']}</p>
    <p>メールアドレス：{$user_data['email']}</p>
    <p>上記のアカウントを削除してもよろしいでしょうか？</p>

    <form method="post" action = "user_delete_done.php">
        <input type = "hidden" name = "user_id" value = "{$user_data['id']}">
        <input type = "button" onclick = "history.back()" value = "戻る">
        <input type = "submit" value = "ＯＫ">
    </form>

</body>

</html>
