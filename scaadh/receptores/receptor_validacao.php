<?php
include_once("../conexao.php");




// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
    header("Location: index.php");
    exit;
}
// Passa os dados da post para uma variavel local
$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

//Fazer a chamada do banco de dados para verificar se os dados para login estão corretos
$sql_code = "
  SELECT usuario, senha, nivelacesso FROM usuario
  WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". md5($senha) ."') 
  AND (`ativo` = 1) LIMIT 1";
  

$sql_query = $conexao->query($sql_code) or die($conexao->error);
$linha = $sql_query->fetch_assoc();



?>