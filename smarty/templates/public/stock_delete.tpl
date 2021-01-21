<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../public/css/common.css">
  <title>在庫削除</title>
</head>
<body>

  <p>購入日　：{$stock_purchase_date}</p>
  <p>消費期限：{$stock_deadline}</p>
  <p>商品名　：{$stock_name}</p>
  <p>値段　　：{$stock_price}</p>
  <p>在庫数　：{$stock_number}</p>

  <p>上記の商品を削除してもよろしいでしょうか？</p>
  <form method = "post" action = "stock_delete_done.php">
    <input type = "hidden" name = "token" value = "{$token}">
    <input type = "hidden" name = "stock_id" value = "{$stock_id}">
    <input type = "hidden" name = "purchase_date" value = "{$stock_purchase_date}">
    <input type = "hidden" name = "deadline" value = "{$stock_deadline}">
    <input type = "hidden" name = "stock_name" value = "{$stock_name}">
    <input type = "hidden" name = "price" value = "{$stock_price}">
    <input type = "hidden" name = "stock_number" value = "{$stock_number}">
    <input type = "button" onclick = "history.back()" value = "戻る">
    <input type = "submit" value = "ＯＫ">
  </form>

</body>
</html>
