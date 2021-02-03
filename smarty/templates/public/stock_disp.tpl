<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/common.css">
    <link rel="stylesheet" href="../public/css/list.css">
    <title>在庫参照</title>
</head>

<body>

    <p>購入日　：{$stock_data['purchase_date']}</p>
    <p>商品名　：{$stock_data['stock_name']}</p>
    <p>値段　　：{$stock_data['price']}</p>
    <p>数量　　：{$stock_data['number']}</p>
    <p>消費期限：{$stock_data['deadline']}</p>

    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>

</body>

</html>