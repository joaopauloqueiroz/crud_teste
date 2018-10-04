<?php
  require_once '../implements/Divida.php';
  require_once '../Validate/ValidateDivida.php';
  
  $div = new Divida;
  $valid = new ValidateDivida;
  
if (isset($_POST['update'])) {
    if ($valid->validate($_POST)) {
        $res = $div->query->updateDivida(
          $div->setValuesInsert($_POST)
        );
        
        $id_find = $_POST['user_id'];
        include("../views/view.php");
    } else {
        $data = $div->setValues($_POST);
        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form-dividas.php";
    }
} else {
    if ($valid->validate($_POST)) {
        $res = $div->query->createDivida(
          $div->setValues($_POST)
  );
        $id_find = $_POST['id'];
        include("../views/view.php");
    } else {
        $data = $div->setValues($_POST);
        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form-dividas.php";
    }
}
