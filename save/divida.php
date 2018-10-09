<?php
  require_once '../implements/Divida.php';
  require_once '../Validate/ValidateDivida.php';
  require_once '../implements/Mount.php';

  $div = new Divida;
  $valid = new ValidateDivida;
  $mon= new Mount;


  //atualizar
if (isset($_POST['update'])) {
    $div->setIdentificador($_POST['identificador']);
    $div->setValor($_POST['valor']);
    $div->setVencimento($_POST['vencimento']);
    $div->setDescricao($_POST['descricao']);
    $div->setUser_id($_POST['user_id']);
    $div->setId($_POST['id']);

    if ($valid->validate($div)) {
        $res = $div->query->updateDivida(
          $mon->setInserDivi($div)
        );
        
        $id_find = $div->getUser_id();
        include("../views/view.php");
    } else {
        $data = $mon->setInserDivi($div);
        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form-dividas.php";
    }
    //inserir
} else {
    $div->setIdentificador($_POST['identificador']);
    $div->setValor($_POST['valor']);
    $div->setVencimento($_POST['vencimento']);
    $div->setDescricao($_POST['descricao']);
    $div->setId($_POST['id']);

    if ($valid->validate($div)) {
        $res = $div->query->createDivida(
        $mon->setValuesDivida($div)
        );

        $id_find = $div->getId();
        include("../views/view.php");
    } else {
        $data = $mon->setValuesDivida($div);
        $data = (Object) $data;
        $erro =  "<div class='alert alert-danger'>Os campos precisão ser preenchidos corretamente!</div>";
        include "../views/form-dividas.php";
    }
}
