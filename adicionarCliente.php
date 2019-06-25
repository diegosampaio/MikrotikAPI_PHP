<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>

<?php

include ('menu.php');
require('routeros_api.class.php');
require('conexao.php');
	$pppoe=$_GET['pppoe'];
	$pppoesenha = $_GET['pppoesenha'];
	$nomecliente = $_GET['nomecliente'];
	$profile = $_GET['profile'];
$API = new RouterosAPI();

$API->debug = false;

if ($API->connect($ip, $login, $senha)) { 


 $API->comm("/ppp/secret/add", array(
          "name"     => $pppoe,
          "password" => $pppoesenha,
          "comment"  => $nomecliente,
          "service"  => "pppoe",
		  "profile" => $profile,
));

 $API->disconnect();
}


?>
</body>
</html>