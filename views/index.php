
<?php
    
    require_once '../implements/Client.php';
    
    $cli = new Client;

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
        <td>'.$value->telefone.'</td>
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
            
        </td>
        </tr>';
            }

        ?>
    </table>


    <form action="form" method="post">
        <input type="hidden" name="novo" value="1">
        <input type="submit" value="Novo" class="btn btn-success">
    </form>
</div>
    </div>

</body>
</html>