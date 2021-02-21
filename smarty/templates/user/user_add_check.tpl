<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
</head>

<body>

    <p>名前：{$user_data['name']}</p>
    <p>メールアドレス：{$user_data['email']}</p>
    <p>上記のユーザーを登録します。</p>
    <p>※パスワードはセキュリティ対策で表示していません。</p>
    <p>問題なければOKを押してください。</p>
    <form method="post" action = "user_add_done.php">
        <input type = "hidden" name = "name" value = "{$user_data['name']}">
        <input type = "hidden" name = "email" value = "{$user_data['email']}">
        <input type = "hidden" name = "pass" value = "{$user_data['pass']}">
        <input type = "hidden" name = "pass2" value = "{$user_data['pass2']}">
        <input type = "button" onclick = "history.back()" value = "戻る">
        <input type = "submit" value = "ＯＫ">
    </form>

</body>

</html>
