<?php 

include_once("../conexao.php");

$usu_codigo = intval($_GET['cod']);


/* |ATRIBUINDO O VALOR DA VARIAVEL DO CADASTRO.PHP PARA UMA VARIAVEL AQUI */

/* PARTE 1 - CONEXÃO COM A TABELA DE USUARIO */
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$email = $_POST['email'];


/* PARTE 2 - CONEXAO COM A TABELA DE LOCALIZACAO */
$municipio = $_POST['municipio'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$telefone = $_POST['telefone'];

/* PARTE 3 - CONEXÃO COM A TABELA EMPREENDIMENTO!!!!!!!!!!Daqui para baixo já está conectado  */
$numero_funcionarios = $_POST['numero_funcionarios'];
$cadastur = $_POST['cadastur'];
$cnpj = $_POST['cnpj'];
$empresa = $_POST['empresa'];
$titular = $_POST['titular'];
$site = $_POST['site'];
$atividade_principal = $_POST['atividade_principal'];
$atividade_secundaria = $_POST['atividade_secundaria'];
$tipo = $_POST['tipo']; 
$dias = $_POST['dia'];

/* N CONSEGUI FAZER FUNCIONAR O DIA E O HORARIO, O DIA TEM QUE SER POR DIA DE SEMANA, N POR DATA>NUMERO. O HORARIO TEM PODE CONTINUAR A USAR O TIME COMO TIPO DE VARIÁVEL, PORÉM TEM QUE SER EM FORMA DE ARRAY(DOIS VALORES)*/
/* $horario_atendimento = $_POST[''];  */



/*Exibir os valores da variável |dias| ainda em formato array */
//print_r($dias);

//Função do capiroto que faz a array virar uma string 
$string = "";
foreach($dias as $dia) {
    $string .= $dia.",";
}
echo "Dias: ".substr($string,0,-1);
echo "<br>";


/* 		|||||||||||INFORMAÇÕES INDO PARA O BANCO DE DADOS |||||||||||||||||*/
$sqla = "
UPDATE localizacao SET
municipio = '$municipio',
rua = '$rua',
bairro = '$bairro',
cep = '$cep',
numero = '$numero',
telefone = '$telefone'
WHERE cod = '$usu_codigo'
";

$sqlb = "
UPDATE usuario SET 
usuario = '$usuario', 
senha = '$senha',
email = '$email'
WHERE cod = '$usu_codigo'
"; 



/* VERIFICANDO SE A INCLUSÃO OCORREU CORRETAMENTE */
	if ($conexao->query($sqla) === TRUE) {
	    echo "Alteração do LOCALIZAÇÃO concluido com sucesso";
	} else {
	    echo "Error: " . $sqla . "<br>" . $conexao->error;
	}
	$codLocalizacao = mysqli_insert_id($conexao);
 

	if ($conexao->query($sqlb) === TRUE) {
	    echo "Alteração do USUARIO concluido com sucesso";
	} else {
	    echo "Error: " . $sqlb . "<br>" . $conexao->error;
	}
	$codUsuario = mysqli_insert_id($conexao);
	
$sqlc = "
UPDATE empreendimento SET 
numero_funcionarios = '$numero_funcionarios',
cadastur = '$cadastur',
cnpj = '$cnpj',
empresa = '$empresa', 
titular = '$titular', 
site = '$site', 
atividade_principal = '$atividade_principal',
atividade_secundaria = '$atividade_secundaria',
tipo = '$tipo',
dias_atendimento = '$string'
WHERE cod = '$usu_codigo'
";


    if ($conexao->query($sqlc) === TRUE) {
	    echo "Alteração do empreendimento concluido com sucesso !<br>";
        header("Location: ../visualizar.php");
	} else {
	    echo "Error: " . $sqlc . "<br>" . $conexao->error;
	}
	$conexao->close();

/*

$dias_atendimentoarmazenavel = explode('.',$dias_atendimento);
print_r($bat)."<br>";
*/
?>
