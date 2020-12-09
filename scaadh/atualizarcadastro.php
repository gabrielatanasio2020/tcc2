<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php
//Efetuando conexão com banco de dados
include("conexao.php");

SESSION_START();
// Pegando a variavel da URL
$usu_codigo = $_SESSION['UsuarioCOD'];


/*Quando a  pagina for redirecionada pra está pagina esse select vai pegar os dados do usuario com o COD selecionado pela variavel da URL*/
$sql_code = "SELECT * FROM usuario 
				INNER JOIN empreendimento
  				WHERE (usuario.cod = '$usu_codigo') and (usuario.cod = empreendimento.cod_usuario);";
$sql_query = $conexao->query($sql_code) or die($conexao->error);
$linha = $sql_query->fetch_assoc();



?>

<body class="bg-primary">
    <!-- Página para inserir os dados de cadastro do usuário na sua entrada no sistema -->



    <div class="container">
        <div class="container-fluid d-flex flex-column align-items-center p-5">

            <div id="borda" class="col-lg-8 p-5 m-3 bg-white border border-success rounded">


                <form id="contactform" action="receptores/receptor_atualizar_empreendimento.php" method="POST">
                    <h3 class="text-center mb-3"> Alterar meus dados do empreendimento</h3>
                    <div class="form-group">

                        <div class="input-control">
                            <label for="usuario">Usuário:</label>
                            <input name="usuario" type="text" class="form-control" value="<?php echo $linha['usuario'];  ?>" required>
                        </div>

                        <!--Dado senha -->
                        <div class="input-control">
                            <label for="senha">Senha:</label>
                            <input name="senha" type="password" class="form-control"  placeholder ="Preencha somente se for alterar senha">
                        </div>


                        <!--Dado CNPJ -->
                        <div class="input-control">
                            <label for="cnpj">CNPJ:</label>
                            <input name="cnpj" class="form-control" type="text" id="cnpj" maxlength="18" required value="<?php echo $linha['cnpj']; ?>">
                        </div>
                        <!--Dado Nome empresa -->
                        <div class="input-control">
                            <label for="Empresa">Nome:</label>
                            <input name="nome" class="form-control" type="text" value="<?php echo $linha['nome']; ?>">
                        </div>

                        <!--Dado titular -->
                        <div class="input-control">
                            <label for="titular">Titular:</label>
                            <input name="titular" class="form-control" type="text" required value="<?php echo $linha['titular']; ?>">
                        </div>

                    </div>

                    <!--Botão para enviar os dados para o arquivo de cadastro no banco de dados -->
                    <button type="submit" name="cadastrar" class="btn btn-primary btn-block">Alterar</button>
                    <a href="./login_usuarios.php" class="btn btn-secondary btn-block" value="Voltar">Voltar</a>

                </form>
            </div>
        </div>
    </div>
</body>

</html>