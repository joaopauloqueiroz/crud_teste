<?php
require_once '../implements/Client.php';
$cli = new Client;
print_r($_POST['id']);
$res = $cli->query->delete($_POST['id']);
header('location: http://localhost/Crud/views/');

?>