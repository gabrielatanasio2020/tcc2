 <?php 
include_once("../conexao.php");

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

/*Exibir os valores da variável |dias| */
print_r($dias);
/*Função do capiroto que faz a array virar uma string */
$string = "";
foreach($dias as $dia) {
    $string .= $dia.",";
}
echo "Dias: ".substr($string,0,-1);
echo "<br>";


/* 		|||||||||||INFORMAÇÕES INDO PARA O BANCO DE DADOS |||||||||||||||||*/
$sqla = "
INSERT INTO localizacao (municipio, rua, bairro, cep, numero, telefone) 
VALUES
('$municipio','$rua','$bairro','$cep','$numero','$telefone');";

$sqlb = "
INSERT INTO usuario (usuario, senha, email) 
VALUES
('$usuario','$senha','$email');
"; 



/* VERIFICANDO SE A INCLUSÃO OCORREU CORRETAMENTE */
	if ($conexao->query($sqla) === TRUE) {
	    echo "Cadastro da localização concluido com sucesso!<br>";
	} else {
	    echo "Error: " . $sqla . "<br>" . $conexao->error;
	}
	$codLocalizacao = mysqli_insert_id($conexao);
 

	if ($conexao->query($sqlb) === TRUE) {
	    echo "Cadastro da usuario concluido com sucesso!<br>";
	} else {
	    echo "Error: " . $sqlb . "<br>" . $conexao->error;
	}
	$codUsuario = mysqli_insert_id($conexao);
	
$sqlc = "
INSERT INTO empreendimento (cod_localizacao,cod_usuario,numero_funcionarios, cadastur, cnpj, empresa, titular, site, atividade_principal, atividade_secundaria, tipo, dias_atendimento) 
VALUES ('$codLocalizacao','$codUsuario','$numero_funcionarios','$cadastur','$cnpj','$empresa','$titular','$site','$atividade_principal','$atividade_secundaria','$tipo','$string');
";


    if ($conexao->query($sqlc) === TRUE) {
	    echo "Cadastro da empreendimento concluido com sucesso!<br>";
header("Location: ../");
    } else {
	    echo "Error: " . $sqlc . "<br>" . $conexao->error;
	}
	$conexao->close();


    
?>
