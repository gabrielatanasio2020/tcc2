<!DOCTYPE html>
<html lang="pt-br">
<!-- PRIMEIRA PÁGINA, LOGAR NO SITE-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body {
            background-color: lightgray;
        }

    </style>

</head>

<body class="helmo">

    <h1>SCAADH</h1>
    <h5>Sistema de Cadastro, Armazenamento e atualização de Dados para Hotelaria</h5>
    <h6>Seja Bem Vindo!</h6>




    <div clas="container">
        <!-- Adicionar o action -->

        <form id="contactform" action="receptores/receptor_" method="post">

            <div class="field">

                <p>Email:</p>
                <input name="email"><br>
                <p>Senha:</p>
                <input type="password" name="senha"><br>
                <br>

                <input type="checkbox" name="remember" value="Mantenha-me conectado">
                Mantenha-me Conectado
                <br>
                <br>
                <a href="index.php"><button type="button" class="btn btn-outline-success">Entrar </button></a>
                <br>
                <br>
                <div id="funciona">
                    <a>Esqueci minha senha</a>
                    <br>
                    <br>
                    <a href="cadastro.php">Cadastrar- me</a>
                </div>
            </div>
        </form>

    </div>


</body>

</html>