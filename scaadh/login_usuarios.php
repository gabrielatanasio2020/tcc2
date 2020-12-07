<!DOCTYPE html>
<html lang="pt-br">

<!-- PÁGINA INICIAL PARA O USUÁRIO-->
<!-- HOME -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        div#preenchimento {
            height: 100vh;
        }
    </style>
</head>



<body class="bg-primary">
    <div class="container-fluid d-flex flex-column text-center align-items-center p-5 ">
        <div class="col-12 col-lg-5 p-2 bg-white border rounded-right">

            <div>
                <h4>Seja Bem-Vindo</h4>
                <h4> ao SCAADH!!</h4>
                <br>
                <br>
            </div>
            <div id="botoeshome">
                <a href="atualizarcadastro.php">
                    <button type="button" class="btn btn btn-primary">Atualizar Dados de Cadastro</button>
                </a>
                <br>
                <br>

                <?php
                include_once("conexao.php");

                session_start();
                $cod =  $_SESSION['UsuarioCOD'];

                $sql_code_se_empreendimento = "SELECT * FROM empreendimento WHERE cod_usuario = '$cod'";

                $sql_proseguir_ou_aviso = $conexao->query($sql_code_se_empreendimento) or die($conexao->error);

                $linha = $sql_proseguir_ou_aviso->fetch_assoc();

                if ($linha['tipo'] === 'Hospedagem') {
                    echo '<a href="formulario_input.php">
                        <button type="button" class="btn btn-primary">Preencher Formulário Semanal </button>
                        </a>';
                }
                ?>



            </div>
        </div>
    </div>
</body>