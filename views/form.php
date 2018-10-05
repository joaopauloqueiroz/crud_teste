<?php
 
  include "header.php";

 ?>
    
    <div class="container">
    <form action="../save/novo.php" class="form" method="post">
    <a href="../views/" class="btn btn-primary" style="float:right; margin-top: 2%;">Home</a>
    <?php
    
 
    if (isset($_POST['novo'])) {
        echo "<h1>Novo Usuario</h1>";
    } else {
        if (isset($_POST['edit'])) {
            $id = $_POST['edit'];
        } else {
            $id = $id_edit;
        }
        require_once "../implements/Client.php";
        echo "<h1>Editar Usuario</h1>";
        echo '<input type="hidden" name="update">';
        
        echo '<input type="hidden" name="id" value="'.$id.'">';
        $cli = new Client;
        $data = $cli->query->get($id)[0];
    }

    if (isset($erros) && count($erros)> 0) {
        foreach ($erros as $value) {
            echo "<div class='alert alert-danger'>".$value."</div>";
        }
    }
    ?>
    <div class="row">
    <div class="form-group">
    <label for="neme">Nome</label>
    <input type="text" name="name" value="<?php echo (isset($data))? $data->nome : "" ;?>" id="name" class="form-control" placeholder="Seu nome">
    </div>
    <div class="form-group">
    <label for="telefone">Telefone</label>
        <input type="text" name="telefone" value="<?php echo (isset($data))? $data->telefone : "" ;?>" id="telefone" class="form-control telefone" placeholder="Sobrenome">
    </div>
    <div class="form-group">
    <label for="email">E-mail</label>
        <input type="email" name="email" value="<?php echo (isset($data))? $data->email: "" ;?>" id="email" class="form-control" placeholder="Seu melhor email">
    </div>
    <div class="form-group">
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" value="<?php echo (isset($data))? $data->endereco : "" ;?>" id="endereco" class="form-control" placeholder="Seu endereço (Opcional)">
    </div>
    
    
    <div class="form-group">
        <input type="submit" value="Salvar" class="btn btn-success" >
    </div>
    </div>
</form>
 </div>

<?php
 
  include "footer.php";

 ?>