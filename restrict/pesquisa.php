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

    <?php

    $pesquisa = $_POST['busca'] ?? "";

    include 'conexao.php';

    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);



    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='busca'>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $cod_pessoa = $linha['cod_pessoa'];
                            $nome = $linha['nome'];
                            $endereco = $linha['endereco'];
                            $telefone = $linha['telefone'];
                            $email = $linha['email'];
                            $data_nascimento = $linha['data_nascimento'];
                            $data_nascimento = mostra_data($data_nascimento);
                            $foto = $linha['foto'];

                            if ($foto != null){
                                $foto = $linha['foto'];
                                $mostra_foto = "<img src='img/$foto' class='lista_foto'/>";
                            }
                            else {
                                $mostra_foto = '';
                            }
                            

                            echo "<tr>
                                    <th>$mostra_foto</th>
                                    <th scope='row'>$nome</th>
                                    <td>$endereco</td>
                                    <td>$telefone</td>
                                    <td>$email</td>
                                    <td>$data_nascimento</td>
                                    <td>
                                        <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success'>Editar</a>
                                        <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirma' 
                                        onClick=" . '"' . "pegar_dados($cod_pessoa, '$nome')" . '"' . ">Excluir</a> 
                                    </td>
                                  </tr>";
                        }
                        ?>

                        <!-- onClick="pegar_dados($id, '$nome')" -->
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-info">Voltar para o Ínicio</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_script.php" method="POST">
                        <p>Deseja excluir <b id="nome_pessoa"></b>?</p>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="id" id="cod_pessoa" class="text-input" value="">
                    <input type="hidden" name="nome" id="nome_pessoa_1" class="text-input" value="">
                    <input type="submit" class="btn btn-danger" value='Sim' />
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome
            document.getElementById('cod_pessoa').value = id
            document.getElementById('nome_pessoa_1').value = nome
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>