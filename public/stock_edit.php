<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel = "stylesheet" href = "css/common.css">
<title>在庫削除</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');
$stock_id = $_GET['stockid'];

try
{
  $sql = 'SELECT purchase_date,deadline,stock_name,price,number FROM stocks WHERE stock_id = ?';
  $stmt = connect()->prepare($sql);
  $data[] = $stock_id;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $stock_purchase_date = $rec['purchase_date'];
  $stock_deadline = $rec['deadline'];
  $stock_name = $rec['stock_name'];
  $stock_price = $rec['price'];
  $stock_number = $rec['number'];
  $dbh = null;
}
catch(Exception $e)
{
	echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}
?>

<p>全ての項目を入力後、修正ボタンを押してください。</p>

<form method = "post" action = "stock_edit_check.php">
<input type = "hidden"name = "stockid" value = "<?php print $stock_id; ?>">

<p>
  <label for = "purchase_date">購入日：　</label>
  <input type = "date" name = "purchase_date" value = "<?php print $stock_purchase_date ?>"><br>
</p>

<p>
  <label for = "deadline">消費期限：</label>
  <input type = "date" name = "deadline" value = "<?php print $stock_deadline ?>"><br>
</p>

<p>
  <label for = "stock_name">商品名：　</label>
  <input type = "text" name = "stock_name" style = "width:160px"  value = "<?php print $stock_name; ?>"><br>
</p>

<p>
  <label for = "price">値段：　　</label>
  <input type = "text" name = "price" style = "width:80px" value = "<?php print $stock_price; ?>"><br>
</p>

<p>
  <label for = "number">在庫数：　</label>
  <input type = "number" name = "number" style = "width:80px" value = "<?php print $stock_number; ?>"><br>
</p>

<input type = "button" onclick = "history.back()" value = "戻る">
<input type = "submit"  value = "修正">
</form>

</body>
</html>
