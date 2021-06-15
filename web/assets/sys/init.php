<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}
ini_set('default_charset','UTF-8');
define('DIRECT', TRUE);
require 'functions.php';
$user = new user;

?>
