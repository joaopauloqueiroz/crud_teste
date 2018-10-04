<?php
require_once '../implements/Client.php';
require_once '../implements/Divida.php';
$cli = new Client;
$div = new Divida;

if (isset($_POST['delete_div'])) {
    $div->query->delete($_POST['delete_div']);
    $id_find = $_POST['id'];
    include("../views/view.php");
} else {
    $res = $cli->query->delete($_POST['id']);
    header('location: ../views/');
}
