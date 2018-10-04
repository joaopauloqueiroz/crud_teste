<?php
require_once '../implements/Client.php';
$cli = new Client();
require_once '../implements/Divida.php';
if (isset($_POST['ver'])) {
    $id = $_POST['ver'];
} else {
    $id = $id_find;
}

$data = $cli->query->get($id)[0];

$div = new Divida;

include('header.php');
?>
  
   
    <div class="container">
    <a href="../views/" class="btn btn-primary" style="float:right; margin-top: 2%;">Home</a>
    <div class="row">
    <h1>Detalhes</h1>

   <div class="form-group">
   <label for="">Nome: </label>
    <?php echo $data->nome; ?>
   </div>
   <div class="form-group">
   <label for="">Telefone: </label>
   <span class="telefone"><?php echo $data->telefone; ?></span>
   </div>
   <div class="form-group">
   <label for="">E-mail: </label>
   <?php echo $data->email; ?>
   </div>
   <div class="form-group">
   <label for="">Endereço: </label>
   <?php echo $data->endereco; ?>
   </div>
    <h1>Dividas</h1>
    <table class="table table-striped">
        <tr>
            <th>Identificador</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Decrição</th>
            <th>Ação</th>
        </tr>
        <?php

        foreach ($div->query->getDivida($id) as $value) {
            echo '<tr>
        <td>'.$value->identificador.'</td>
        <td>'.$value->valor.'</td>
        <td>'.$value->vencimento.'</td>
        <td>'.$value->descricao.'</td>
        <td>
            <form action="../views/form-dividas.php" method="post" style="display: inline;">
            <input type="hidden" name="update"><input type="hidden" name="id" value="'.$value->id.'">
            <input type="hidden" name="user_id" value="'.$value->user_id.'">
                <input type="submit" value="Editar" class="btn btn-primary">
            </form>

            <form action="../save/deletar.php" method="post" style="display: inline;">
            <input type="hidden" name="delete_div" value="'.$value->id.'">
            <input type="hidden" name="id" value="'.$id.'">
                <input type="submit" value="Deletar" class="btn btn-danger">
            </form>
            
        </td>
        </tr>';
        }
        ?>
    </table>

   <form action="../views/form-dividas.php" method="post">
   
   <input type="hidden" name="id" value="<?php echo $_POST['ver'];?>">
        <input type="submit" value="Nova Divida" value="div" class="btn btn-success">
   </form>
</div>
<?php
  include "footer.php";
 ?>