<!DOCTYPE html>
<html lang="pt-br">
<!-- PRIMEIRA PÁGINA, LOGAR NO SITE-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login</title>

</head>

<body class="helmo">

    <h1>SCAADH</h1>
    <h5>Sistema de Cadastro, Armazenamento e atualização de Dados para Hotelaria</h5>
    <h6>Seja Bem Vindo!</h6>


    <div clas="container">
        <!-- Adicionar o action -->

        <form id="contactform" action="./receptores/receptor_validacao.php" method="POST">

            <div class="field">
                <p>Nome de usuario:</p>
                <input name="usuario"><br>
                <p>Senha:</p>
                <input type="password" name="senha"><br>
                <br>
            </div>
            <button type="submit" name="logar" class="btn btn-outline-success">Login</button>
        </form>

        <a class="btn btn-primary" id="cad_empresa" href="./cadastro.php">Cadastrar empresa</a>
    </div>
</body>

</html>