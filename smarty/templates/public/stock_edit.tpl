<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../public/css/common.css">
  <link rel = "stylesheet" href = "../public/css/list.css">
  <title>在庫編集</title>
</head>
<body>

  <p>全ての項目を入力後、修正ボタンを押してください。</p>

  <form method = "post" action = "stock_edit_check.php">
    <input type = "hidden" name = "stock_id" value = "{$stock_id}">
    <p>
      <label for = "purchase_date">
        購入日<font color = "red">※</font>：　
        <input type = "date" name = "purchase_date" id ="purchase_date" value = "{$stock_purchase_date}" required><br>
      </label>
    </p>

    <p>
      <label for = "deadline">
        消費期限<font color = "red">※</font>：
        <input type = "date" name = "deadline" id = "deadline" value = "{$stock_deadline}" required><br>
      </label>
    </p>

    <p>
      <label for = "stock_name">
        商品名<font color = "red">※</font>：　
        <input type = "text" name = "stock_name" id = "stock_name" style = "width:160px"  value = "{$stock_name}" required><br>
      </label>
    </p>

    <p>
      <label for = "price">
        値段<font color = "red">※</font>：　　
        <input type = "text" name = "price" id = "price" style = "width:80px" value = "{$stock_price}" required><br>
      </label>
    </p>

    <p>
      <label for = "number">
        在庫数<font color = "red">※</font>：　
        <input type = "number" name = "number" id = "number" style = "width:80px" value = "{$stock_number}" required><br>
      </label>
    </p>
    <input type = "button" onclick = "history.back()" value = "戻る">
    <input type = "submit"  value = "修正">
  </form>

</body>
</html>
