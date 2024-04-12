<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./restrict/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-5">
                <div class="h-100 p-5 bg-secondary border rounded-3">
                    <h2>Cadastro Web - Login</h2>
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small class="form-text text-muted">Entre com seus dados de acesso.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input name="senha" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Acessar</button>
                    </form>
                    <?php

                    if (isset($_POST['login'])) {
                        $login = $_POST['login'];
                        $senha = $_POST['senha'];

                        if (($login == "admin") and ($senha == "admin")) {
                            session_start();
                            $_SESSION['user'] = 'Arthur';
                            header("location: restrict");
                        } else {
                            echo "Login Inválido";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>