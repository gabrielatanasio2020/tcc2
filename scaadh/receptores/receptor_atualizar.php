<?php 

include_once("../conexao.php");

$usu_codigo = intval($_GET['cod_usuario']);


/* |ATRIBUINDO O VALOR DA VARIAVEL DO CADASTRO.PHP PARA UMA VARIAVEL AQUI */

/* PARTE 1 - CONEXÃO COM A TABELA DE USUARIO */
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];




/* PARTE 2 - CONEXÃO COM A TABELA EMPREENDIMENTO!!!!!!!!!!Daqui para baixo já está conectado  */
$cnpj = $_POST['cnpj'];
$titular = $_POST['titular'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$capacidade = $_POST['capacidade'];




/* 		|||||||||||INFORMAÇÕES INDO PARA O BANCO DE DADOS |||||||||||||||||*/


$sqlb = "
UPDATE usuario SET 
usuario = '$usuario', 
senha = '$senha'
WHERE cod = '$usu_codigo'"; 



/* VERIFICANDO SE A INCLUSÃO OCORREU CORRETAMENTE */

	if ($conexao->query($sqlb) === TRUE) {
	    echo "Alteração do USUARIO concluido com sucesso";
	} else {
	    echo "Error: " . $sqlb . "<br>" . $conexao->error;
	}
	
	
$sqlc = "
UPDATE empreendimento SET 
cnpj = '$cnpj',
nome = '$nome', 
titular = '$titular', 
tipo = '$tipo'
WHERE cod_usuario = '$usu_codigo';
";


    if ($conexao->query($sqlc) === TRUE) {
	    echo "Alteração do empreendimento concluido com sucesso !<br>";
        header("Location: ../visualizar.php");
	} else {
	    echo "Error: " . $sqlc . "<br>" . $conexao->error;
	}
	$conexao->close();
