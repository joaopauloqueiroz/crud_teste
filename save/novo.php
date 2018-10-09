<?php
require_once '../implements/Mount.php';
require_once '../implements/Client.php';
require_once '../Validate/ValidateUser.php';

$cli = new Client;
$valid = new ValidateUser;
$mon = new Mount();



if (isset($_POST['update'])) {
    $cli->setName($_POST['name']);
    $cli->setEmail($_POST['email']);
    $cli->setTelefone($_POST['telefone']);
    $cli->setEndereco($_POST['endereco']);
    $cli->setId($_POST['id']);
    $id_edit = $cli->getId();
    
    $erros = $valid->validate($cli);
    if (count($erros) <= 0) {
        $res = $cli->query->updateUser(
            $mon->setValues($cli)
        );
        header('location: ../views/index.php');
    } else {
        $data = $mon->setValues($cli);
        $data = (Object) $data;
        $erro =  $erros;
        include "../views/form.php";
    }
} else {
    $cli->setName($_POST['name']);
    $cli->setTelefone($_POST['telefone']);
    $cli->setEmail($_POST['email']);
    $cli->setEndereco($_POST['endereco']);

    $erros = $valid->validate($cli);
    if (count($erros) <= 0) {
        $res = $cli->query->createUser(
            $mon->setValuesInsert($cli)
        );
        header('location: http://localhost/crud_teste/views/');
    } else {
        $data = $mon->setValuesInsert($cli);
        $id_edit = $_POST['edit'];
        $data = (Object) $data;
        $erro =  $erros;
        include "../views/form.php";
    }
}
