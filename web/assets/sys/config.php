<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR');

define('DB_HOST', 'localhost');
define('DB_NAME', 'zumbosys');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('ERROR_MESSAGE', 'Erro de conexão <br> Por favor, contate o Desenvolvedor.<br> Powered by Zumbo :)');

try {
$odb = new PDO('mysql:host=' . DB_HOST . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
}
catch( PDOException $Exception ) {
	error_log('ERROR: '.$Exception->getMessage().' - '.$_SERVER['REQUEST_URI'].' at '.date('l jS \of F, Y, h:i:s A')."\n", 3, 'error.log');
	die(ERROR_MESSAGE);
}

function error($string)
{
return '<div class="alert alert-danger alert-dismissable" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> '.$string.'</div>';
}

function success($string)
{
return '<div class="alert alert-success alert-dismissable" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> '.$string.'</div>';
}
?>