<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/common.css">
    <title>在庫登録</title>
</head>

<body>

    <p>購入日　：{$stock_data['purchase_date']}</p>
    <p>消費期限：{$stock_data['deadline']}</p>
    <p>商品名　：{$stock_data['stock_name']}</p>
    <p>値段　　：{$stock_data['price']}</p>
    <p>数量　　：{$stock_data['number']}</p>

    <p>上記の内容で登録します。</p>
    <p>問題なければOKを押してください</p>
    <form method="post" action="stock_register_done.php">
        <input type="hidden" name="stock_id" value="{$stock_data['stock_id']}">
        <input type="hidden" name="purchase_date" value="{$stock_data['purchase_date']}">
        <input type="hidden" name="deadline" value="{$stock_data['deadline']}">
        <input type="hidden" name="stock_name" value="{$stock_data['stock_name']}">
        <input type="hidden" name="price" value="{$stock_data['price']}">
        <input type="hidden" name="number" value="{$stock_data['number']}">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="ＯＫ">
    </form>

</body>

</html>