

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
    
    <title>Crud</title>
</head>
<body>
    
    <div class="container">
    <div class="row">
  <form action="../save/divida.php" method="post" class="form">
  <?php
    echo (isset($erro )? $erro : "");
    if(isset($_POST['update'])){
      echo "<h1>Editar Divida</h1>";
      echo '<input type="hidden" name="update">';
     
      require_once "../implements/Divida.php";
      $div = new Divida;
      $data = $div->query->getDivida($_POST['id'])[0];
      echo '<input type="hidden" name="update_id" value="'.$data->id.'">';
  }else{
    echo "<h1>Nova Divida</h1>";
  }
  ?>
    <div class="form-group">
    <label for="identificador">Estabelecimento</label>
    <input type="text" name="identificador" value="<?php echo (isset($data))? $data->identificador : "" ;?>" id="identificador" class="form-control" placeholder="Identifique o estabelecimento/lugar da compra">

    </div>
    <div class="form-group">
    <label for="valor">Valor</label>
      <input type="number" name="valor" value="<?php echo (isset($data))? $data->valor : "" ;?>" id="valor" class="form-control" placeholder="Valor">
    </div>
    <div class="form-group">
    <label for="vencimento">Data de Vencimento</label>
      <input type="date" name="vencimento" id="vencimento" value="<?php echo (isset($data))? $data->vencimento : "" ;?>" class="form-control" placeholder="Data de Vencimento">
    </div>
    <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao"  cols="30" rows="10" class="form-control" placeholder="Descrição da divida"><?php echo (isset($data))?$data->descricao:"";?></textarea></div>
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
    <input type="hidden" name="user_id" value="<?php echo (isset($data))? $data->user_id : "" ;?>">
    <input type="submit" value="Salvar" class="btn btn-success">
  </form>
</div>
    </div>

</body>
</html>