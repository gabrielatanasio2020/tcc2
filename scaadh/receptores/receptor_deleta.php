<?php 
include_once("../conexao.php");

    $usu_codigo = intval($_GET['cod']);



    $sql_code = "DELETE FROM usuario WHERE cod = '$usu_codigo'";
    $sql_query = $conexao ->query($sql_code) or die ($conexao ->error);


    $sql_codee = "DELETE FROM localizacao WHERE cod = '$usu_codigo'";
    $sql_queryy = $conexao ->query($sql_codee) or die ($conexao ->error);

    
	if($sql_query)
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
