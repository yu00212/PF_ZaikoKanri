<!DOCTYPE html>
<html lang = "ja">
{include file = "./head.tpl" title=$title}
</head>

<body>

	{if isset($err['name'])}
		{$err['name']}<br />
	{/if}

	{if isset($err['email'])}
		{$err['email']} <br />
	{/if}

	{if isset($err['pass'])}
		{$err['pass']} <br />
	{/if}

	{if isset($err['pass2'])}
		{$err['pass2']} <br />
	{/if}

	{if isset($err['match'])}
		{$err['match']} <br />
	{/if}

	{if isset($err['mis'])}
		{$err['mis']} <br />
	{/if}

	{if isset($err['purchase_date'])}
		{$err['purchase_date']} <br />
	{/if}

	{if isset($err['deadline'])}
		{$err['stock_deadline']} <br />
	{/if}

	{if isset($err['price'])}
		{$err['stock_price']} <br />
	{/if}

	{if isset($err['number'])}
		{$err['stock_number']} <br />
	{/if}

	{if isset($err['token'])}
		{$err['token']} <br />
	{/if}

	{if isset($err['search'])}
		{$err['search']} <br />
	{/if}

	{if isset($err['misSearch'])}
		{$err['misSearch']} <br />
	{/if}

	{if isset($err['select'])}
		{$err['select']}<br />
	{/if}

	{if isset($err['exception'])}
		{$err['exception']}<br />
		<p>ただいま障害により大変ご迷惑お掛けしております。</p>
	{/if}

    <input type = "button" onclick = "history.back()" value = "戻る" />
</body>

</html>
