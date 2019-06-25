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

$API = new RouterosAPI();

$API->debug = false;

if ($API->connect($ip, $login, $senha)) {

$ARRAY = $API->comm("/ppp/secret/print");
	 
  echo "
	<table id='tab' width=700 border=1>
 	<tr>
		<th size=3>Dados</th>
		<th size=3>PPPoE</th>
		<th size=3>Senha</th>
		<th size=3>Planos</th>
	</tr>
	<tr>";
	
	for($i=0; $i<count($ARRAY);$i++)
	{	
		$regtable = $ARRAY[$i];
	echo "<font color=#04B404 size=3>
	<tr>
	<td align='center'>" . $regtable['comment'] . "</td>
	<td align='center'>" . $regtable['name'] . "</td>
	<td align='center'>" . $regtable['password'] . "</td>
	<td align='center'>" . $regtable['profile'] . "</td>
	</tr>
	</font>";
	}
	
echo "
	</table>";
   $API->disconnect();
	
}

?>
</body>
</html>