<?php
require_once '../implements/Client.php';
$cli = new Client();
require_once '../implements/Divida.php';
$data = $cli->query->get($_POST['ver']);
$div = new Divida;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="public/js/jquery-2.1.1.js"></script>
    
    <title>Crud</title>
</head>
<body>
    
    <div class="container">
    <div class="row">
    <h1>Detalhes</h1>

   <div class="form-group">
   <label for="">Nome: </label>
    <?php echo $data[0]->nome; ?>
   </div>
   <div class="form-group">
   <label for="">Telefone</label>
   <?php echo $data[0]->telefone; ?>
   </div>
   <div class="form-group">
   <label for="">E-mail</label>
   <?php echo $data[0]->email; ?>
   </div>
   <div class="form-group">
   <label for="">Endereço</label>
   <?php echo $data[0]->endereco; ?>
   </div>
    <h1>Dividas</h1>
    <table class="table table-striped">
        <tr>
            <th>Identificador</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Decrição</th>
        </tr>
        <?php

        foreach ($div->query->getDivida($_POST['ver']) as $value) {
        echo '<tr>
        <td>'.$value->identificador.'</td>
        <td>'.$value->valor.'</td>
        <td>'.$value->vencimento.'</td>
        <td>'.$value->descricao.'</td>
        <td>
            <form action="../views/form-dividas.php" method="post" style="display: inline;">
            <input type="hidden" name="update"><input type="hidden" name="id" value="'.$data[0]->id.'">
            <input type="hidden" name="user_id" value="'.$value->user_id.'">
                <input type="submit" value="Editar" class="btn btn-primary">
            </form>
            
        </td>
        </tr>';
        }
        ?>
    </table>

   <form action="form-dividas.php" method="post">
   
   <input type="hidden" name="id" value="<?php echo $_POST['ver'];?>">
        <input type="submit" value="Nova Divida" value="div" class="btn btn-success">
   </form>
</div>
    </div>



</body>
</html>