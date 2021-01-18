<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
　<meta charset = "UTF-8">
　<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
　<link rel = "stylesheet" href = "css/common.css">
　<title>在庫登録</title>
</head>
<body>

  <div class = "register">
    <p>全ての項目を入力後「登録」を押してください。</p>
      <form method = "post" action = "stock_register_check.php" enctype = "multipart/form-data">
        <p>
          <label for = "purchase_date">
            購入日<font color = "red">※</font>：　<input type = "date" name = "purchase_date" value = "2020-12-01" required><br>
          </label>
        </p>

        <p>
          <label for = "deadline">
            消費期限<font color = "red">※</font>：<input type = "date" name = "deadline" value = "2020-11-13" required><br>
          </label>
        </p>

        <p>
          <label for = "stock_name">
            商品名<font color = "red">※</font>：　<input type = "text" name = "stock_name" style = "width:160px" size = "50" required><br>
          </label>
        </p>

        <p>
          <label for = "price">
            値段<font color = "red">※</font>：　　<input type = "text" name = "price" style = "width:80px" size = "50" required><br>
          </label>
        </p>

        <p>
          <label for = "number">
            在庫数<font color = "red">※</font>：　<input type = "number" name = "number" style = "width:80px" required><br>
          </label>
        </p>
        <br>

        <input type = "button" onclick = "history.back()" value = "戻る">
        <input type = "submit"  value = "登録">
      </form>
  </div>

</body>
</html>
