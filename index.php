<?php

session_start(); // inicia sessao ou restaura os dados da sessao 

if (!isset ($_SESSION["visitante"])) { // se nao foi setada a variavel de sessao do visitante

	

	header("Location: login.php"); // manda para a pagina de login

	exit;

}

?><!DOCTYPE HTML>

<html>

<head>



<meta charset="utf-8">

<link rel="shortcut icon" href="img/favicon.png" >

<?

  include '../include/conexao.php';
  include '../include/estilos.html';
  include './dados.html';
  include '../include/metas.html';

  if(!empty($nome_pagina)) {
        if($pagina == "imoveis") {
?>

<title>Im&oacute;veis | <?=$nome_site;?></title>

<? } else { ?>

<title><?=htmlentities($nome_pagina)." | ".$nome_site;?></title>

<? } } else { ?>

<title><?=$nome_site;?></title>

<? } ?>

</head>

<body>


<div id="container"><center>

<!-- Cabeçalho -->

<?

  include './cabecalho.html';


?>

<!-- Fim do Cabeçalho -->

<!-- Conteúdo -->

<?

if ($pagina == '') { 

  include './home.html';

}

else {
  

  if (file_exists('./include/'.$pagina.'.html')) {

  include './include/'.$pagina.'.html';

  }

  else {
        include '../include/404.html';

  }

}

?>

<!-- Fim do Conteúdo -->



<!-- Rodapé -->

<?


  include './rodape.html';


?>

<!-- Fim do Rodapé -->

</center></div>



<?

  include '../include/scripts.html';

?>

</body>

</html>