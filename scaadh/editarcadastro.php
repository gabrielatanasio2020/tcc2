﻿<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <!--Link para o css da página -->
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Estilização somente desta página -->
    <style>
        body {
            background-color: lightgray;
        }

        h2 {
            text-align: center;
        }
    </style>

</head>
<?php
//Efetuando conexão com banco de dados
include("conexao.php");


// Pegando a variavel da URL
$usu_codigo = intval($_GET['cod']);

//Esse IF serve para garantir a inicialização do método SESSION 
if (isset($_POST['cadastrar'])) {

    //1 - Registro dos dados
    if (!isset($SESSION))
        session_start();

    //2 - Armazenar os dados
    foreach ($_POST as $chave => $valor)
        $SESSION[$chave] = $valor;
}
//Deposi que verificou a se tem o SESSION, ele vai fazer a busca no vanco de dados 
else {

    /*Quando a  pagina for redirecionada pra está pagina esse select vai pegar os dados do usuario com o COD selecionado pela variavel da URL*/
    $sql_code = "SELECT * FROM usuario 
				INNER JOIN empreendimento
  				WHERE (usuario.cod = '$usu_codigo') and (usuario.cod = empreendimento.cod_usuario);";
    $sql_query = $conexao->query($sql_code) or die($conexao->error);
    $linha = $sql_query->fetch_assoc();
}

?>

<body>
    <!-- Página para inserir os dados de cadastro do usuário na sua entrada no sistema -->

    <!-- AQUI EU ADICIONEI NA TABELA OS OUTROS DADOS -->

    <div class="container">

        <form id="contactform" action="receptores/receptor_atualizar.php?cod=<?php echo $linha['cod']; ?>" method="POST">
            <h2> Editar dados do empreendimento</h2>



            <!--Dado usuário -->
            <div class="parte1">
                <div class="field">
                    <p>
                        <label for="usuario">Usuário:</label>
                        <input name="usuario" type="text" value="<?php echo $linha['usuario'];  ?>" required>
                    </p>
                </div>
                
                <!--Dado senha -->
                <div class="field">
                    <p>
                        <label for="senha">Senha:</label>
                        <input name="senha" type="password" value="<?php echo $linha['senha'];  ?>" required>
                    </p>
                </div>

                <!--Dado cadastur -->
                <div class="field">
                    <p>
                        <label for="cadastur">Cadastur:</label>
                        <input name="cadastur" type="text" maxlength="18" required value="<?php echo $linha['cadastur'];?>">
                    </p>
                </div>
                <!--Dado CNPJ -->
                <div class="field">
                    <p>
                        <label for="cnpj">CNPJ:</label>
                        <input name="cnpj" type="text" id="cnpj" maxlength="18" required value="<?php echo $linha['cnpj'];?>">
                    </p>
                </div>
                <!--Dado empresa -->
                <div class="field">
                    <p>
                        <label for="Empresa">Empresa:</label>
                        <input name="empresa" type="text" required value="<?php echo $linha['empresa'];?>">
                    </p>
                </div>
                <!--Dado titular -->
                <div class="field">
                    <p>
                        <label for="titular">Titular:</label>
                        <input name="titular" type="text" required value="<?php echo $linha['titular'];?>">
                    </p>
                </div>
                <!--Dado tipo empreendimento -->
                <div class="field">
                    <p>
                        <label for="tipo">Tipo:<br>  </label>

                        <input name="tipo" type="radio" value="Gastronomia" <?php if($linha['tipo']=="Gastronomia" ) echo "checked";?>>Gastronomia<br>

                        <input name="tipo" type="radio" value="Hospedagem" <?php if($linha['tipo']=="Hospedagem" ) echo "checked";?>>Hospedagem<br>

                        <input name="tipo" type="radio" value="Operadora" <?php if($linha['tipo']=="Operadora" ) echo "checked";?>>Operadora
                    </p>
                </div>

         <br>
            </div>
            <br>
            <!--Botão para enviar os dados para o arquivo de cadastro no banco de dados -->
            <button type="submit" name="cadastrar" class="btn btn-outline-success">Alterar</button> <input type="button" class="btn btn-outline-success" value="Voltar" onClick="JavaScript: window.history.back();">
        </form>
    </div>
</body>

</html>