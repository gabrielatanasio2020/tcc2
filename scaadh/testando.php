<?php
include_once("../conexao.php");



// Passa os dados da post para uma variavel local
$usuario = 'gabrielzinho';
$senha = '123';


//Fazer a chamada do banco de dados para verificar se os dados para login estão corretos
$sql_code = "
  SELECT * FROM usuario
  WHERE (`usuario` = '$usuario ') AND (`senha` = '$senha') LIMIT 1 ;";

$sql_query = $conexao->query($sql_code) or die($conexao->error);
$num_rows = $sql_query->num_rows;


 
  $linha = $sql_query->fetch_assoc();

 
  session_start();
  // Salva os dados encontrados na sessão
  $_SESSION['UsuarioCOD'] = $linha['cod'];
  $_SESSION['UsuarioNivel'] = $linha['nivelacesso'];

 
var_dump($_SESSION);