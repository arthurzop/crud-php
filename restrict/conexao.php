<?php 


    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $bd = 'empresa';

    
    if($conn = mysqli_connect($server, $user, $pass, $bd)){
        // echo 'Conectado';
    } 
    else {
        echo 'Erro!';
    }   

    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
                $texto
              </div>";
    }

    function mostra_data($data){
        $d = explode("-", $data); //pega a variável data e divide em 3 (tira o -)
        $escreve = $d[2] . '/' . $d[1] . '/' . $d[0]; //reescreve a varialvel na ordem inversa concatenando o / entre elas (com o .)
        return $escreve; // retorna a variavel formatada
    }

    function mover_foto($vetor_foto){
        $vtipo = explode('/', $vetor_foto['type']);
        $tipo = $vtipo[0] ?? ""; 
        $extensao = $vtipo[1] ?? "";
        if(!$vetor_foto['error'] and ($vetor_foto['size'] <= 5000000) and ($tipo == 'image')){
           $nome_arquivo = date('ymdhms') . "." . $extensao ;
            move_uploaded_file($vetor_foto['tmp_name'], 'img/'. $nome_arquivo);
            return $nome_arquivo;
        }
        else{
           return 0;
        }
    }