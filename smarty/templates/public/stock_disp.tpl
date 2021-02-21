<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
<link rel = "stylesheet" href = "../public/css/list.css">
</head>

<body>

    <p>購入日　：{$stock_data['purchase_date']}</p>
    <p>商品名　：{$stock_data['stock_name']}</p>
    <p>値段　　：{$stock_data['price']}</p>
    <p>数量　　：{$stock_data['number']}</p>
    <p>消費期限：{$stock_data['deadline']}</p>

    <form>
        <input type = "button" onclick = "history.back()" value = "戻る">
    </form>

</body>

</html>
