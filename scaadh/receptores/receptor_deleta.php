<?php 
include_once("../conexao.php");

    $usu_codigo = intval($_GET['cod']);


	$vamoo = "SELECT hospedagem.cod FROM hospedagem 
	inner join empreendimento WHERE empreendimento.cod_usuario = '$usu_codigo'";
	
	$sql_que= $conexao ->query($vamoo) or die ($conexao ->error);
	
	$linha = $sql_que->fetch_assoc();
	
	$cod_mano = $linha['cod'];

	$sql_code = "DELETE FROM `hospedagem` WHERE (`cod` = '$cod_mano');";
	$sql_query = $conexao ->query($sql_code) or die ($conexao ->error);

	$sql_code2 = "DELETE FROM usuario WHERE cod = '$usu_codigo'";
    $sql_query1 = $conexao ->query($sql_code2) or die ($conexao ->error);

	
	
       
	if($sql_query1)
	echo "
	<script>
		location.href='../visualizar.php';
	</script>
	";
	
	else
	echo"
	
	<script>
			alert('Não foi possivel deletar o usuario.');
			location.href='../visualizar.php';
	</script>
	";

?>
