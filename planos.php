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

$ARRAY = $API->comm("/ppp/profile/print");
	 
  echo "
	<table id='tab' width=600 border=1>
 	<tr>
		<th size=3>Planos</th>
	</tr>
	<tr>";
	
	for($i=0; $i<count($ARRAY);$i++)
	{	
		$regtable = $ARRAY[$i];
	echo "<font color=#04B404 size=3>
	<tr>
	<td align='center'>" . $regtable['name'] . "</td>
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