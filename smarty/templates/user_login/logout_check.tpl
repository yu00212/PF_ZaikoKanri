<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
</head>

<body>

	<p>ログアウトしますか？</p>
	<form action = "logout.php">
		<input type = "button" onclick = "history.back()" value = "戻る">
		<input type = "submit" value = "はい">
	</form>

</body>
</html>

