<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../public/css/common.css">
  <title>ログインチェック</title>
</head>
<body>

{if isset($err['name'])}
{$err['name']}
{/if}

{if isset($err['email'])}
{$err['email']}
{/if}

{if isset($err['pass'])}
{$err['pass']}
{/if}

{if isset($err['pass2'])}
{$err['pass2']}
{/if}

{if isset($err['match'])}
{$err['match']}
{/if}

{if isset($err['mis'])}
{$err['mis']}
{/if}

{if isset($err['purchase_date'])}
{$err['purchase_date']}
{/if}

{if isset($err['stock_deadline'])}
{$err['stock_deadline']}
{/if}

{if isset($err['stock_name'])}
{$err['stock_name']}
{/if}

{if isset($err['stock_price'])}
{$err['stock_price']}
{/if}

{if isset($err['stock_number'])}
{$err['stock_number']}
{/if}

{if isset($err['token'])}
{$err['token']}
{/if}

{if isset($err['search'])}
{$err['search']}
{/if}

{if isset($err['misSearch'])}
{$err['misSearch']}
{/if}

{if isset($err['exception'])}
{$err['exception']}<br>
<p>ただいま障害により大変ご迷惑お掛けしております。</p>
{/if}

<br>
<input type = "button" onclick = "history.back()" value = "戻る">

</body>
</html>
