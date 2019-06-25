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
if ($API->connect($ip, $login, $senha)) {}
$ARRAY = $API->comm("/ppp/profile/print");
?>

	<form action="adicionarCliente.php">
        PPPoE: <input type="text" name="pppoe" /><br>
        Senha: <input type="text" name="pppoesenha" /><br>
        Nome Do Cliente: <input type="text" name="nomecliente" /><br>
        Megas: <select name="profile">
      <?php for($i=0; $i<count($ARRAY);$i++){
       		$regtable = $ARRAY[$i];
			if(substr($regtable['name'],0,1)=='P'){
		?>
			<option value="<?php echo $regtable['name']; ?>"><?php echo $regtable['name']; ?></option>
        <?php }}?>
           
            
        </select>
        <input type="submit" />
</form>
</body>
</html>