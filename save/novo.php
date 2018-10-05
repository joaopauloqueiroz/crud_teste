<?php
require_once '../implements/Client.php';
require_once '../Validate/ValidateUser.php';

$cli = new Client;
$valid = new ValidateUser;

if (isset($_POST['update'])) {
    $id_edit = $_POST['id'];
    $erros = $valid->validate($_POST);
    if (count($erros) <= 0) {
        $res = $cli->query->updateUser(
            $cli->setValues($_POST)
        );
        header('location: http://localhost/crud_teste/views/index.php');
    } else {
        $data = $cli->setValues($_POST);
        $data = (Object) $data;
        $erro =  $erros;
        include "../views/form.php";
    }
} else {
    $erros = $valid->validate($_POST);
    if (count($erros) <= 0) {
        $res = $cli->query->createUser(
            $cli->setValuesInsert($_POST)
        );
        header('location: http://localhost/crud_teste/views/');
    } else {
        $data = $cli->setValuesInsert($_POST);
        $id_edit = $_POST['edit'];
        $data = (Object) $data;
        $erro =  $erros;
        include "../views/form.php";
    }
}
