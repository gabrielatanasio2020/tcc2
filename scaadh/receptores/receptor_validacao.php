<?php
include_once("../conexao.php");

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if ((!empty($_POST['usuario']) or !empty($_POST['senha']))) {
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
$num_rows = $sql_query->num_rows;


//verificando se a busca deu somente um usuário
if ($num_rows != 1) {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  header("Location: ../index.php");
  echo "Login inválido! Preencha os dados corretamente ou cadastre-se caso não for cadastrado";
  exit;
} else {
  // Salva os dados encontrados na variável $resultado
  $linha = $sql_query->fetch_assoc();

  session_start();
  // Salva os dados encontrados na sessão
  $_SESSION['UsuarioCOD'] = $linha['cod'];
  $_SESSION['UsuarioNivel'] = $linha['nivelacesso'];



  if ($_SESSION['UsuarioNivel'] == 1) {
    header("Location: ../login.php");
  } else if ($_SESSION['UsuarioNivel'] == 2) {
    header("Location: ../login_usuarios.php");
  } else {
    echo "Error";
  }


  exit;
}
