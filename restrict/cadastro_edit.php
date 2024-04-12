<?php include "../validar.php"?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
        include 'conexao.php';

        $id = $_GET['id'] ?? ''; //consulta o banco pelo id (metodo get) e aplica a variavel $id, se nao tiver deixa em branco

        $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";  //puxa tudo da pessoas quando o id passado for igual ao id que esta no banco

        $dados = mysqli_query($conn, $sql); //coloca o que foi puxado pelo sql na variavel $dados

        $linha = mysqli_fetch_assoc($dados); //coloca o dados na variavel $linha


    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Alteração de Cadastro</h1>
                <form action="edit_script.php" method='POST'>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name='nome' value='<?php echo $linha['nome'];?>'>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name='endereco'  value='<?php echo $linha['endereco']; ?>'>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name='telefone'  value='<?php echo $linha['telefone'];?>'>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name='email'  value='<?php echo $linha['email'];?>'>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Nome Completo</label>
                        <input type="date" class="form-control" name='data_nascimento'  value='<?php echo $linha['data_nascimento'];?>'>
                    </div>
                    <div class="form-group col">
                      <input type="submit" class='btn btn-success' value="Salvar Alterações">
                      <a href="index.php" class="btn btn-info">Voltar</a>
                      <input type="hidden" name='id' value='<?php echo $linha['cod_pessoa'];?>'
                    </div>
                </form>
               
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>