<?php include "../validar.php"?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            include "conexao.php"; //para puxar a variavel de outro arquivo :0

            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];

            $foto = $_FILES['foto'];
            $nome_foto = mover_foto($foto); 

            if ($nome_foto == 0){
                $nome_foto = null;
            }


            $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`) 
            VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento', '$nome_foto')"; // se der erro é agui

            if (mysqli_query($conn, $sql)){
                if($nome_foto != null){
                    echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                };
                mensagem("$nome foi cadastrado.", 'success');
            }else{
                mensagem("$nome NÃO foi cadastrado.", 'danger');
            }
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>