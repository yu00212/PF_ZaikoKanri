<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel = "stylesheet" href = "css/common.css">
<title>在庫削除</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');
$stock_id = $_POST['stock_id'];

if (isset($_POST["token"]) && $_POST["token"]  ===  $_SESSION['token'])
{
  try
  {
    $sql = 'DELETE FROM stocks WHERE stock_id = ?';
    $stmt = connect()->prepare($sql);
    $data[] = $stock_id;
    $stmt->execute($data);
    $dbh = null;
  }
  catch (Exception $e)
  {
  	echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
  	print 'ただいま障害により大変ご迷惑をお掛けしております。';
  	exit();
  }
  print '<p>削除しました。</p>';
}
else
{
  echo "不正なリクエストです";
}
?>

<form action = "list.php">
<input type = "submit" value = "在庫一覧へ">
</form>

</body>
</html>
