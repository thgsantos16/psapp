<?php

session_start();

if(!empty($_POST)){
	
	include ("conexao.php");

	$erro = '';

	if(empty($_POST["login"])) $erro = "Por favor, digite o Usuário!<br>";
	if(empty($_POST["senha"])) $erro .= "Por favor, digite a Senha!";

	$nome=$_POST["login"];
	$senha=$_POST["senha"];

	if(empty($erro) || $erro == '') {

		$sql = "SELECT * FROM usuarios WHERE login = '$nome' AND senha = '$senha'"; 
		$res = mysql_query($sql, $con); 
		$num_usuario = mysql_num_rows($res); 

		if ($num_usuario) {
			$row = mysql_fetch_array($res);

			$_SESSION["login"] = $row["login"];
			$_SESSION["nome"] = $row["nome"];
			$_SESSION["id"] = $row["id"];
			$_SESSION["acesso"] = $row["acesso"];
			header("location: ./");
		}

		else $erro = "Usuário ou Senha Incorretos!";
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="UTF-8">
<link href="css/screen.css" rel="stylesheet" type="text/css">

<title>PSAPP - Sistema de Gestão</title>

</head>

<body id="login">

<main>

<form name="form" method="post" action="login.php">

<img src="img/logoLogin.png" id="logoLogin">

<input name="login" id="usuario" placeholder="Usuário" required>

<input type="password" name="senha" id="senha" placeholder="Senha" required>

<input type="submit" value="Entrar">
</form>

<?php if(!empty($erro) && $erro != '') echo "<p id='erroLogin'>{$erro}</p>"; ?>

</main>

</body>
</html>