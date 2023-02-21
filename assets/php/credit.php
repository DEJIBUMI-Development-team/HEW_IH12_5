<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: sans-serif;
			background-color: rgb(248, 248, 215);
		}

		form {
			max-width: 300px;
			margin: 80px auto;
			padding: 30px 40px;
			background-color: #fff;
			border-radius: 8px;
		}

		label {
			line-height: 1.5;
			font-weight: bold;
		}

		input,
		label {
			display: block;
			margin: 0.25em 0;
		}

		button {
			margin-top: 20px;
			background-color: #03a9f4;
			border-radius: 4px;
			color: #fff;
			font-size: 14px;
			font-weight: bold;
			line-height: 26px;
			padding: 0 10px;
			width: 100%;
			box-sizing: border-box;
			cursor: pointer;
			outline: none;
			border: none;
		}
	</style>
</head>

<body>
	<form action="" method="POST">
		<label for="name">氏名:</label>
		<input type="text" id="name" name="name"><br />
		<label for="cardNumber">カード番号:</label>
		<input type="text" id="cardNumber" name="cardNumber"><br />
		<label for="expirationDate">有効期限:</label>
		<input type="date" id="expirationDate" name="expirationDate"><br />
		<label for="cvv">CVVコード:</label>
		<input type="number" id="cvv" name="cvv"><br />
		<button type="submit">送信</button>
	</form>
</body>

</html>