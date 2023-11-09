<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION['id'])) {
       die("Você não pode acessar a página porque não está logado.<p><a href=\"login.php\">Entrar</a>");
    }
?>