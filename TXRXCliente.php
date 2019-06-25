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
$interface = $_GET['login'];
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect($ip, $login, $senha)) {}$API = new RouterosAPI();
	$API->debug = false;
	if ($API->connect($ip , $login , $senha, $portwww)) {
		$rows = array(); $rows2 = array();	
		   $API->write("/interface/monitor-traffic",false);
		   $API->write("=interface=<pppoe-".$interface.">",false);  
		   $API->write("=once=",true);
		   $READ = $API->read(false);
		   $ARRAY = $API->parseResponse($READ);
			if(count($ARRAY)>0){  
				$rx = number_format($ARRAY[0]["rx-bits-per-second"]/1024,1);
				$tx = number_format($ARRAY[0]["tx-bits-per-second"]/1024,1);
				$rows['name'] = 'Tx';
				$rows['data'][] = $tx;
				$rows2['name'] = 'Rx';
				$rows2['data'][] = $rx;
			}else{  
				echo $ARRAY['!trap'][0]['message'];	 
			} 
	}else{
		echo "<font color='#ff0000'>La conexion ha fallado. Verifique si el Api esta activo.</font>";
	}
	$API->disconnect();

	echo "Download: ".$tx."<br>Upload: ".$rx;
	
	?>
</body>
</html>