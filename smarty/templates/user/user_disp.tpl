<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
<link rel = "stylesheet" href = "../public/css/list.css">
</head>

<body>

    <p>名前：{$user_data['name']}</p>
    <p>メールアドレス：{$user_data['email']}</p>
    <form>
        <input type = "button" onclick = "history.back()" value = "戻る">
    </form>

</body>

</html>
