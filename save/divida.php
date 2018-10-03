<?php
  require_once '../implements/Divida.php';
  require_once '../Validate/ValidateDivida.php';
  
  $div = new Divida;
  $valid = new ValidateDivida;
  
if (isset($_POST['update'])) {
    if ($valid->validate($_POST)) {
        $res = $div->query->updateDivida(array(
      "identificador" => $_POST['identificador'],
      "valor" => $_POST['valor'],
      "vencimento" => $_POST['vencimento'],
      "descricao" => $_POST['descricao'],
      "user_id" => $_POST['user_id'],
      "id" => $_POST['update_id']
  ));
  header("location: http://localhost/Crud/views/");
}else{
  $data = [
    "identificador" => $_POST['identificador'],
      "valor" => $_POST['valor'],
      "vencimento" => $_POST['vencimento'],
      "descricao" => $_POST['descricao'],
      "user" => $_POST['id']
      
  ];
  $data = (Object) $data;
  $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
  include "../views/form-dividas.php";
}

}else{
    if ($valid->validate($_POST)) {
        $res = $div->query->createDivida(array(
      "identificador" => $_POST['identificador'],
      "valor" => $_POST['valor'],
      "vencimento" => $_POST['vencimento'],
      "descricao" => $_POST['descricao'],
      "user_id" => $_POST['id'],
  ));
  header("location: http://localhost/Crud/views/");
    } else {
        $data = [
    "identificador" => $_POST['identificador'],
      "valor" => $_POST['valor'],
      "vencimento" => $_POST['vencimento'],
      "descricao" => $_POST['descricao'],
      "user_id" => $_POST['id']
      
  ];
        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form-dividas.php";
    }
}
?>