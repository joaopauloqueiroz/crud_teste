
<?php
    include "header.php";
    require_once '../implements/Client.php';
    
    $cli = new Client;

?>
    <div class="container">
    <div class="form-group">
    <h1>Listagem de Usuarios</h1>
    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ação</th>
        </tr>
        <?php

            foreach ($cli->query->getAll() as $value) {
                echo '<tr>
        <td>'.$value->nome.'</td>
        <td class="telefone">'.$value->telefone.'</td>
        <td>'.$value->email.'</td>
        <td class="d-inline">
            <form action="view.php" method="post" style="display: inline;">
                <input type="hidden" name="ver" value="'.$value->id.'">
                <input type="submit" value="Ver" class="btn btn-success">
            </form>

            <form action="form.php" method="post" style="display: inline;">
                <input type="hidden" name="edit" value="'.$value->id.'">
                <input type="submit" value="Editar" class="btn btn-primary">
            </form>
            
            <form action="../save/deletar.php" method="post" style="display: inline;">
                <input type="hidden" name="id" value="'.$value->id.'">
                <input type="submit" value="Deletar" class="btn btn-danger">
            </form>

        </td>
        </tr>';
            }

        ?>
    </table>


    <form action="form.php" method="post">
        <input type="hidden" name="novo" value="1">
        <input type="submit" value="Novo Usuario" class="btn btn-success">
    </form>
</div>
<?php
 
  include "footer.php";

 ?>