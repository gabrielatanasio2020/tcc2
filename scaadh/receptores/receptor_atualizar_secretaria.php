<?php

include_once("../conexao.php");
session_start();

$usu_codigo = $_SESSION['UsuarioCOD'];

/* |ATRIBUINDO O VALOR DA VARIAVEL DO CADASTRO.PHP PARA UMA VARIAVEL AQUI */

/* PARTE 1 - CONEXÃO COM A TABELA DE USUARIO */
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


/* PARTE 2 - CONEXÃO COM A TABELA EMPREENDIMENTO!!!!!!!!!!Daqui para baixo já está conectado  */
$cnpj = $_POST['cnpj'];
$secretario = $_POST['secretario'];

/* 		|||||||||||INFORMAÇÕES INDO PARA O BANCO DE DADOS |||||||||||||||||*/

if (empty($senha)) {
    $sqlb = "
    UPDATE usuario SET 
    usuario = '$usuario'    
    WHERE cod = '$usu_codigo'";



    /* VERIFICANDO SE A INCLUSÃO OCORREU CORRETAMENTE */

    if ($conexao->query($sqlb) === TRUE) {
        echo "Alteração do USUARIO concluido com sucesso";
    } else {
        echo "Error: " . $sqlb . "<br>" . $conexao->error;
    }
} else {

    $criptografada = md5($senha);

    $sqlb = "
    UPDATE usuario SET 
    usuario = '$usuario', 
    senha = '$criptografada'
    WHERE cod = '$usu_codigo'";



    /* VERIFICANDO SE A INCLUSÃO OCORREU CORRETAMENTE */

    if ($conexao->query($sqlb) === TRUE) {
        echo "Alteração do USUARIO concluido com sucesso";
    } else {
        echo "Error: " . $sqlb . "<br>" . $conexao->error;
    }
}


$sqlc = "
UPDATE secretaria SET 
cnpj = '$cnpj',
secretario = '$secretario'
WHERE cod_usuario = '$usu_codigo'";


if ($conexao->query($sqlc) === TRUE) {
    echo "Alteração do empreendimento concluido com sucesso !<br>";
    header("Location: ../login.php");
} else {
    echo "Error: " . $sqlc . "<br>" . $conexao->error;
}
$conexao->close();
