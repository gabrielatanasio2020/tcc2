 <?php 
include_once("../conexao.php");

/* |ATRIBUINDO O VALOR DA VARIAVEL DO CADASTRO.PHP PARA UMA VARIAVEL AQUI */

/* PARTE 1 - CONEXÃO COM A TABELA DE USUARIO */
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$email = $_POST['email'];


/* PARTE 2 - CONEXÃO COM A TABELA EMPREENDIMENTO!!!!!!!!!!Daqui para baixo já está conectado  */
$cnpj = $_POST['cnpj'];
$titular = $_POST['titular'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo']; 
$capacidade = $_POST['capacidade'];


/* 		|||||||||||INFORMAÇÕES INDO PARA O BANCO DE DADOS |||||||||||||||||*/
	
if ($tipo = 'Gastronomia'){
	$sql_selecao= "INSERT INTO gastronomia (capacidade_maxima) VALUES
	($capacidade);
	";
}else if ($tipo = 'Hospedagem'){
	$sql_selecao= "INSERT INTO hospedagem (capacidade_maxima) VALUES
	($capacidade);
	";
}else if ($tipo = 'Operadora'){
	$sql_selecao= "INSERT INTO operadora (cod) VALUES
	();
	";
}else {echo "Recepitor errado";};



if ($conexao->query($sql_selecao) === TRUE) {
	echo "Cadastro da seleção concluido com sucesso!<br>";
} else {
	echo "Error: " . $sql_selecao . "<br>" . $conexao->error;
}
$codTipo= mysqli_insert_id($conexao);





$sql_a = "
INSERT INTO usuario (usuario, senha, email) 
VALUES
('$usuario','$senha','$email');
"; 


/* VERIFICANDO SE A INCLUSÃO OCORREU CORRETAMENTE */

	if ($conexao->query($sql_a) === TRUE) {
	    echo "Cadastro da usuario concluido com sucesso!<br>";
	} else {
	    echo "Error: " . $sql_a . "<br>" . $conexao->error;
	}
	$codUsuario = mysqli_insert_id($conexao);



	
$sql_b = "
INSERT INTO empreendimento (cod_usuario, cod_operadora,cod_gastronomia cnpj, nome, titular, tipo) 
VALUES ('$codUsuario','$cnpj','$nome','$titular','$tipo');
";


    if ($conexao->query($sql_b) === TRUE) {
	    echo "Cadastro da empreendimento concluido com sucesso!<br>";
		header("Location: ../index.php");
    } else {
	    echo "Error: " . $sql_b . "<br>" . $conexao->error;
	}
	$conexao->close();
    
?>
