<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
</head>

<body>

    <p>{$stock_data['stock_name']}を追加しました。</p>
    <form action = "../public/list.php">
        <input type = "submit" value = "在庫一覧へ">
    </form>

</body>

</html>
