<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <!--Link para o css da página -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Estilização somente desta página -->

</head>
<?php
//Efetuando conexão com banco de dados
include("conexao.php");

SESSION_START();
// Pegando a variavel da URL
$usu_codigo = $_SESSION['UsuarioCOD'];


/*Quando a  pagina for redirecionada pra está pagina esse select vai pegar os dados do usuario com o COD selecionado pela variavel da URL*/
$sql_code = "SELECT * FROM usuario 
				INNER JOIN secretaria
  				WHERE (usuario.cod = '$usu_codigo') and (usuario.cod = secretaria.cod_usuario);";
$sql_query = $conexao->query($sql_code) or die($conexao->error);

$linha = $sql_query->fetch_assoc();



?>

<body class="bg-primary">
    <!-- Página para inserir os dados de cadastro do usuário na sua entrada no sistema -->

    <!-- AQUI EU ADICIONEI NA TABELA OS OUTROS DADOS -->

    <div class="container">
        <div class="container-fluid d-flex flex-column align-items-center p-5">
            <div id="borda" class="col-lg-8 p-5 m-3 bg-white border border-success rounded">

                <form id="contactform" action="receptores/receptor_atualizar_secretaria.php" method="POST">
                    <h3 class="text-center mb-3"> Alterar dados de cadastro</h3>
                    <br>
                    <!--Dado usuário -->
                    <div class="form-group">
                        <div class="field">
                            <p>
                                <label for="usuario">Usuário:</label>
                                <input name="usuario" class="form-control" type="text" value="<?php echo $linha['usuario'];  ?>" required>
                            </p>
                        </div>

                        <!--Dado senha -->
                        <div class="field">
                            <p>
                                <label for="senha">Senha:</label>
                                <input name="senha" class="form-control" placeholder ="Preencha somente se for alterar senha" type="password">
                            </p>
                        </div>


                        <!--Dado CNPJ -->
                        <div class="field">
                            <p>
                                <label for="cnpj">CNPJ:</label>
                                <input name="cnpj" class="form-control" type="text" id="cnpj" maxlength="18" required value="<?php echo $linha['cnpj']; ?>">
                            </p>
                        </div>
                        <!--Dado Secretario Atual-->
                        <div class="field">
                            <p>
                                <label for="Empresa">Secretario:</label>
                                <input name="secretario" class="form-control" type="text" value="<?php echo $linha['secretario']; ?>">
                            </p>
                        </div>


                    </div>
                    <br>
                    <!--Botão para enviar os dados para o arquivo de cadastro no banco de dados -->
                    <button type="submit" name="cadastrar" class="btn btn-primary btn-block">Alterar</button>
                    <a href="./login.php" class="btn btn-secondary btn-block" value="Voltar">Voltar</a>

                </form>
            </div>
        </div>
    </div>
</body>

</html>