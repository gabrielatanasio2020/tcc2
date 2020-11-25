<?php
include_once("../conexao.php");

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
  header("Location: ../index.php");
}


// Passa os dados da post para uma variavel local
$usuario =  $conexao->real_escape_string($_POST['usuario']);
$senha = $conexao->real_escape_string($_POST['senha']);



//Fazer a chamada do banco de dados para verificar se os dados para login estão corretos
$sql_code = "
  SELECT * FROM usuario
  WHERE (`usuario` = '$usuario ') AND (`senha` = '$senha') LIMIT 1 ;";

$sql_query = $conexao->query($sql_code) or die($conexao->error);

//Especificando a quantidade de linhas de retorno

$numero_linha = mysql_num_rows($sql_query);

//verificando se a busca deu somente um usuário
if ($numero_linha != 1) {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  echo "Login inválido!";
  exit;
} else {
  // Salva os dados encontrados na variável $resultado
  $linha = $sql_query->fetch_assoc();

  // Se a sessão não existir, inicia uma
  if (!isset($_SESSION)) {
    session_start();
  }

  // Salva os dados encontrados na sessão
  $_SESSION['UsuarioCOD'] = $linha['cod'];
  $_SESSION['UsuarioNivel'] = $linha['nivelacesso'];

  if ($linha['nivelacesso'] = 1) {
    header("Location: ../login.php");
  } else if ($linha['nivelacesso'] = 2) {
    header("Location: ../login_usuarios.php");
  } else {
    echo "Error";
  }


  exit;
}
