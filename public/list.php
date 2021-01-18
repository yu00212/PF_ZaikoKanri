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
　<link rel = "stylesheet" href = "css/list.css">
　<link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.0.4/css/all.css">
<script src = "https://www.w3schools.com/lib/w3.js"></script>
　<title>商品一覧</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');
try
{
  $sql = 'SELECT stock_id,purchase_date,deadline,stock_name,price,number FROM stocks WHERE 1';
  $stmt = connect()->prepare($sql);
  $stmt->execute();
  $dbh = null;
}
catch(Exception $e)
{
  echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
  print'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}
?>

<div id = "menu-list">
　<ul>
  　<li><a href = "../user/user_list.php">アカウント編集</a></li>
  　<li><a href = "../user_login/user_logout_check.php">ログアウト</a></li>
　</ul>
</div>

<form method = "post" action = "stock_branch.php">
<input type = "submit" name = "disp" value = "参照">
<input type = "submit" name = "edit" value = "修正">
<input type = "submit" name = "delete" value = "削除">
<input type = "submit" name = "add" value = "追加">
<input type = "text" name = "search_name" class = "search">
<input type = "submit" value = "検索">
<br>

<table class = "sorttbl" id = "myTable" border = "2">
<tr>
<th class = "radio-th"></th> <!-- th幅 調整予定 -->
<th class = "purchase_date-th">購入日</th>
<th class = "stock_name-th">商品</th>
<th class = "price-th">値段</th>
<th class = "number-th">数量</th>
<th class = "deadline-th" onclick = "w3.sortHTML('#myTable','.item', 'td:nth-child(6)')">消費期限&nbsp;<i class = "fa fa-sort"></i></th>
</tr>

<?php
while(true)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec == false)
  {
    break;
  }
?>

<tr class = "item">
  <td><input type = "radio" name = "stockid" value = "<?php print $rec['stock_id'] ?>"></td>
  <td><?php print $rec['purchase_date']; ?> </td>
  <td><?php print $rec['stock_name']; ?> </td>
  <td>¥<?php print $rec['price']; ?></td>
  <td><?php print $rec['number']; ?></td>
  <td><?php print $rec['deadline']; ?> </td>
</tr>
<?php
}
?>
</table>

<input type = "submit" name = "disp" value = "参照">
<input type = "submit" name = "edit" value = "修正">
<input type = "submit" name = "delete" value = "削除">
<input type = "submit" name = "add" value = "追加">
</form>

</body>
</html>



