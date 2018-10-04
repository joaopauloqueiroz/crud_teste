<?php
require_once '../implements/Client.php';
require_once '../implements/Divida.php';
$cli = new Client;
$div = new Divida;

if(isset($_POST['delete_div'])){
	$div->query->delete($_POST['id']);	
}else{
$res = $cli->query->delete($_POST['id']);
}

header('location: http://localhost/crud_teste/views/');

?>