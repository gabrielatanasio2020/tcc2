<?php
// ESTABELECE A CONEXAO COM O BANCO DE DADOS

$hostname = "localhost";
$user = "root";
$password = "";
$database = "scaadh_melhorado";
// Criar conexao
$conexao = new mysqli($hostname, $user, $password, $database) or die (mysql_error());
// Checar conexao
if ($conexao->connect_error) {
    die("Conexão falhou !!!" . $conexao->connect_error);
}
