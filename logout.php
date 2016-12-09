<?php 

session_start();

unset ($_SESSION["visitante"]);

session_destroy();

header("Location: login.php");

?>