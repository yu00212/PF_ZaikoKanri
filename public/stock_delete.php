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

// 暗号学的的に安全なランダムなバイナリを生成し、それを16進数に変換することでASCII文字列に変換
$toke_byte = openssl_random_pseudo_bytes(16);
$token = bin2hex($toke_byte);
// 生成したトークンをセッションに保存
$_SESSION['token'] = $token;

try
{
  $sql = 'SELECT stock_id,purchase_date,deadline,stock_name,price,number FROM stocks WHERE stock_id = ?';
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

<p>購入日　：<?php print $stock_purchase_date; ?></p>
<p>消費期限：<?php print $stock_deadline; ?></p>
<p>商品名　：<?php print $stock_name; ?></p>
<p>値段　　：<?php print $stock_price; ?></p>
<p>在庫数　：<?php print $stock_number; ?></p>
<p>上記の商品を削除してもよろしいでしょうか？</p>

<form method = "post" action = "stock_delete_done.php">
<input type = "hidden" name = "token" value = "<?php print $token; ?>">  <!--生成したトークン付与-->
<input type = "hidden" name = "stock_id" value = "<?php print $stock_id; ?>">
<input type = "hidden" name = "purchase_date" value = "<?php print $stock_purchase_date; ?>">
<input type = "hidden" name = "deadline" value = "<?php print $stock_deadline; ?>">
<input type = "hidden" name = "stock_name" value = "<?php print $stock_name; ?>">
<input type = "hidden" name = "price" value = "<?php print $stock_price; ?>">
<input type = "hidden" name = "stock_number" value = "<?php print $stock_number; ?>">
<input type = "button" onclick = "history.back()" value = "戻る">
<input type = "submit" value = "ＯＫ">
</form>

</body>
</html>
