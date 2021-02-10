<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/common.css">
    <link rel="stylesheet" href="../public/css/list.css">
    <title>アカウント編集</title>
</head>

<body>

    <p>名前：<input type="text" name="name" style="width:200px" value="{$user_data['name']}"></p>
    <p>メールアドレス：<input type="email" name="email" style="width:200px" value="{$user_data['email']}"></p>
    <p>上記のように変更します。</p>
    <p>※パスワードはセキュリティ対策で表示していません。</p>
    <p>問題なければOKを押してください。</p>
    <form method="post" action="user_edit_done.php">
        <input type="hidden" name="user_id" value="{$user_data['user_id']}">
        <input type="hidden" name="name" value="{$user_data['name']}">
        <input type="hidden" name="email" value="{$user_data['email']}">
        <input type="hidden" name="pass" value="{$user_data['pass']}">
        <input type="hidden" name="pass2" value="{$user_data['pass2']}">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="ＯＫ">
    </form>

</body>

</html>