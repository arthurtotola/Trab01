<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo "O e-mail não pode ser vazio";
    }else if (strlen($_POST['senha']) == 0) {
        echo "A senha não pode ser vazia.";
    }else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $cod_consul_sql = "SELECT * FROM usuario WHERE email='$email' AND senha = '$senha'";
        $result_consult_sql = $mysqli->query($cod_consul_sql) or die("Falha na execução da consulta".$mysqli->error());

        $qnt_linhas_result_consult = $result_consult_sql->num_rows;

        if ($qnt_linhas_result_consult == 1) {
            $usuario = $result_consult_sql->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            
            header("Location: painel.php");
        }else{
            echo "E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Login</h1>
        <label for="email">E-mail</label>
        <input type="text" placeholder="Digite seu e-mail" name="email">
        <label for="senha">Senha</label>
        <input type="password" placeholder = "Informe sua senha" name="senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>