<?php
require_once '../implements/Client.php';
require_once '../Validate/ValidateUser.php';

$cli = new Client;
$valid = new ValidateUser;

if (isset($_POST['update'])) {

    if ($valid->validate($_POST)) {
        $res = $cli->query->updateUser(array(
        "nome" => $_POST['name'],
        "telefone" => $_POST['telefone'],
        "email"  => $_POST['email'],
        "endereco" => $_POST['endereco'],
        "id" => $_POST['id']
    ));
        header('location: http://localhost/Crud/views/');
    } else {
        $data = [
        "nome" => $_POST['name'],
        "telefone" => $_POST['telefone'],
        "email" => $_POST['email'],
        "endereco" => $_POST['endereco']

    ];
        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form.php";
    }

}else{
    if ($valid->validate($_POST)) {
        $res = $cli->query->createUser(array(
        "nome" => $_POST['name'],
        "telefone" => $_POST['telefone'],
        "email"  => $_POST['email'],
        "endereco" => $_POST['endereco']
    ));
        header('location: http://localhost/Crud/views/');
    } else {
        $data = [
        "nome" => $_POST['name'],
        "telefone" => $_POST['telefone'],
        "email" => $_POST['email'],
        "endereco" => $_POST['endereco']

    ];
        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form.php";
    }
}