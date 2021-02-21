<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
</head>
<body>

	<p>項目を入力後「ログイン」を押してください。</p>
    <form method = "POST" action = "login_check.php">
		<p>
			<label for = "email">
				メールアドレス<font color = "red">※</font>：
				<input type = "email" name = "email" id = "email" required><br>
			</label>
		</p>

		<p>
			<label for = "pass">
				パスワード<font color = "red">※</font>：
			<input type = "password" name = "pass" id = "pass" required><br>
			</label>
		</p>

		<input type = "submit" value = "ログイン">
    </form>

    <br>
    <form action = "../user/user_add.html">
		<input type = "submit" value = "新規登録はこちら">
    </form>

</body>
</html>

