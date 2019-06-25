<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php 
	include 'menu.php';
	require('conexao.php');
	echo "<tr>";
	echo "<h3>Grafico Link</h3>";
	echo '<td><img src="http://'.$ip.':'.$portwww.'/graphs/iface/'.$inteface.'/daily.gif" /></td>';
	echo "</tr>";
?>
</body>
</html>