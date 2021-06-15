<?php
if (!isset($_SERVER['HTTP_REFERER'])) {die;}
require 'config.php';
require 'init.php';


$ip = $_SERVER['REMOTE_ADDR'];

if ($user -> LoggedIn())
{
echo success('Você já se encontra conectado! Redirecionando...');
die();
}

$type = $_GET['type'];

if ($type == 'login')
{
	
$cpf = $_POST['cpf'];
$password = $_POST['password'];
$date = strtotime('-1 hour', time());
$attempts=$odb->query("SELECT COUNT(*) FROM `loginlogs` WHERE `ip` = '$ip' AND `cpf` LIKE '%failed' AND `date` BETWEEN '$date' AND UNIX_TIMESTAMP()")->fetchColumn(0);
if ($attempts>2) {
$date = strtotime('+1 hour', $waittime=$odb->query("SELECT `date` FROM `loginlogs` WHERE `ip` = '$ip' ORDER BY `date` DESC LIMIT 1")->fetchColumn(0) - time());
die(error('Muitas tentativas. Aguarde '.$date.' segundos e tente novamente.'));
}


   if (isset($_POST['remember'])) {

  location.reload();
} 

if (empty($cpf) || empty($password) || strlen($cpf) < 4 || strlen($cpf) > 16)
{
die(error('Por favor, preencha todas as caixas...'));
}

$SQLCheckLogin = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `cpf` = :cpf AND `password` = :password");
$SQLCheckLogin -> execute(array(':cpf' => $cpf, ':password' => SHA1(md5($password))));
$countLogin = $SQLCheckLogin -> fetchColumn(0);
if (!($countLogin == 1))
{
$SQL = $odb -> prepare("INSERT INTO `loginlogs` VALUES(:cpf, :ip, UNIX_TIMESTAMP(), 'XX')");
$SQL -> execute(array(':cpf' => $cpf." - failed",':ip' => $ip));
die(error('Usuário ou Senha inválido..'));
}

$SQL = $odb -> prepare("SELECT * FROM `users` WHERE `cpf` = :cpf");
$SQL -> execute(array(':cpf' => $cpf));
$userInfo = $SQL -> fetch();
$ipcountry = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip)) -> {'geoplugin_countryName'};
if (empty($ipcountry)) {$ipcountry = 'XX';}
$SQL = $odb -> prepare('INSERT INTO `loginlogs` VALUES(:cpf, :ip, UNIX_TIMESTAMP(), :ipcountry)');
$SQL -> execute(array(':ip' => $ip, ':cpf' => $cpf, ':ipcountry' => $ipcountry));
$_SESSION['cpf'] = $userInfo['cpf'];
$_SESSION['nomec'] = $userInfo['nomec'];
$_SESSION['ID'] = $userInfo['ID'];
echo success('Bem-Vindo(a), ' .$_SESSION['nomec']. '. Redirecionando...');
}


?>