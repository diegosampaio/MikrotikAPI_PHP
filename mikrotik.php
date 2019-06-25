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

$ARRAY = $API->comm("/system/resource/print");


$first = $ARRAY['0'];
$memperc = ($first['free-memory']/$first['total-memory']);
$hddperc = ($first['free-hdd-space']/$first['total-hdd-space']);
$mem = ($memperc*100);
$hdd = ($hddperc*100);
echo "<br />";
echo "<table width=550 border=0 align=center>";

echo "<tr><td>Platform, board name and Ros version is:</td><td>" . $first['platform'] . " - " . $first['board-name'] . " - "  . $first['version'] . " - " . $first['architecture-name'] . "</td></tr><br />";
echo "<tr><td>Cpu and available cores:</td><td>" . $first['cpu'] . " at " . $first['cpu-frequency'] . " Mhz with " . $first['cpu-count'] . " core(s) "  . "</td></tr><br />";
echo "<tr><td>Uptime is:</td><td>" . $first['uptime'] . " (hh/mm/ss)" . "</td></tr><br />";
echo "<tr><td>Cpu Load is:</td><td>" . $first['cpu-load'] . " %" . "</td></tr><br />";



echo "</table>";

echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";

   $API->disconnect();

}

?>

</body>
</html>