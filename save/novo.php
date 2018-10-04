<?php
require_once '../implements/Client.php';
require_once '../Validate/ValidateUser.php';

$cli = new Client;
$valid = new ValidateUser;

if (isset($_POST['update'])) {

    if ($valid->validate($_POST)) {
        
        $res = $cli->query->updateUser(
            $cli->setValues($_POST)
        );
        header('location: http://localhost/crud_teste/views/index.php');
    } else {
        $data = $cli->setValues($_POST);

        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form.php";
    }

}else{
    if ($valid->validate($_POST)) {
        $res = $cli->query->createUser(
            $cli->setValuesInsert($_POST)
        );
        header('location: http://localhost/crud_teste/views/');
    } else {
        $data = $cli->setValuesInsert($_POST);

        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form.php";
    }
}