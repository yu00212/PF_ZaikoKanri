<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
</head>

<body>

    <p>{$user_data['name']}さんを追加しました。</p><br>
    <form action = "../user_login/login_form.php">
        <input type = "submit" value = "ログイン画面へ">
    </form>

</body>

</html>
