<?php

$usuario = 'root';
$senha = '';
$bancoDeDados = 'login';
$servidor = 'localhost';

// Criar a conexão com o banco de dados
$mysqli = new mysqli($servidor,$usuario,$senha,$bancoDeDados);
if ($mysqli->error) {
    die("Falha em conectar ao banco de dados".$mysql->error());
}
