<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../public/css/common.css">
  <link rel = "stylesheet" href = "css/stock_search.css">
  <title>在庫検索</title>
</head>
<body>

  <p>「{$search_name}」で検索しました。</p>
  {if $row_count === 0}
    <p>該当商品はありません。</p>
  {else}
    <p>{$row_count}件の該当商品がありました。</p>
    <table class = "sorttbl" id = "myTable" border = '1'>
      <tr><th>ID</th><th>購入日</th><th>商品名</th><th>値段</th><th>数量</th><th>消費期限</th></tr>
        {foreach $rows as $row}
          <tr>
            <td>{$row[0]}</td>
            <td>{$row[1]}</td>
            <td>{$row[3]}</td>
            <td>¥{$row[4]}</td>
            <td>{$row[5]}</td>
            <td>{$row[2]}</td>
          </tr>
        {/foreach}
    </table>
  {/if}


  <form>
  <input type = "button" onclick = "history.back()" value = "戻る">
  </form>

</body>
</html>
