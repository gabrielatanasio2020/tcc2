<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <!--Link para o css da página -->
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
        include("conexao.php");        
            if (isset ($_POST['cadastrar'])){

                //1 - Registro dos dados
                if (!isset($SESSION))
                    session_start();

                //2 - Armazenar os dados
                foreach($_POST as $chave =>$valor)
                    $SESSION[$chave] = $valor;
            }
               
    ?>

<body>
    <!-- Página para inserir os dados de cadastro do usuário na sua entrada no sistema -->

    <!-- AQUI EU ADICIONEI NA TABELA OS OUTROS DADOS -->
    <div class="container">

        <form id="contactform" action="receptores/receptor_cadastro.php" method="POST">
            <h2> Dados do empreendimento</h2>

            <!--Dado usuário -->
            <div class="parte1">
                <div class="field">
                    <p>
                        <label for="usuario">Usuário:</label>
                        <input name="usuario" type="text" required>
                    </p>
                </div>

                <!--Dado email -->
                <div class="field">
                    <p>
                        <label for="email">Email:</label>
                        <input name="email" type="email" required>
                    </p>
                </div>

                <!--Dado senha -->
                <div class="field">
                    <p>
                        <label for="senha">Senha:</label>
                        <input name="senha" type="password" required>
                    </p>
                </div>

                <!--Dado municipio -->
                <div class="field">
                    <p>
                        <label for="municipio">Município:</label>
                        <input name="municipio" type="text" required>
                    </p>
                </div>

                <!--Dado bairro -->
                <div class="field">
                    <p>
                        <label for="bairro">Bairro:</label>
                        <input name="bairro" type="text" required>
                    </p>
                </div>
                <!--Dado rua -->
                <div class="field">
                    <p>
                        <label for="rua">Rua:</label>
                        <input name="rua" type="text" required>
                    </p>
                </div>
                <!--Dado mumero da casa ou empreendimento -->
                <div class="field">
                    <p>
                        <label for="numero">Número do local:</label>
                        <input name="numero" type="number">
                    </p>
                </div>
                <br>
                <!--Dado CEP -->
                <div class="field">
                    <p>
                        <label for="cep">CEP:</label>
                        <input name="cep" type="number">
                    </p>
                </div>
                <!--Dado telefone -->
                <div class="field">
                    <p>
                        <label for="telefone">Telefone:</label>
                        <input name="telefone" type="number">
                    </p>
                </div>
            </div>
            <div class="parte2">

                <!--Dado numero funcionario -->
                <div class="field">
                    <p>
                        <label for="numero funcionarios">Número de Funcionários:</label>
                        <input name="numero_funcionarios" type="number" required>
                    </p>
                </div>
                <br>

                <!--Dado cadastur -->
                <div class="field">
                    <p>
                        <label for="cadastur">Cadastur:</label>
                        <input name="cadastur" maxlength="18" type="text" required>
                    </p>
                </div>
                <!--Dado CNPJ -->
                <div class="field">
                    <p>
                        <label for="cnpj">CNPJ:</label>
                        <input name="cnpj" type="text" maxlength="18" id="cnpj" required>
                    </p>
                </div>
                <!--Dado empresa -->
                <div class="field">
                    <p>
                        <label for="Empresa">Empresa:</label>
                        <input name="empresa" type="text" required>
                    </p>
                </div>
                <!--Dado titular -->
                <div class="field">
                    <p>
                        <label for="titular">Titular:</label>
                        <input name="titular" type="text" required>
                    </p>
                </div>
                <!--Dado site -->
                <div class="field">
                    <p>
                        <label for="site">Site:</label>
                        <input name="site" type="text">
                    </p>
                </div>
                <!--Dado Atividade principal -->
                <div class="field">
                    <p>
                        <label for="atividadeprin">Atividade principal:</label>
                        <input name="atividade_principal" type="text">
                    </p>
                </div>
                <br>

                <!--Dado atividade secundaria -->
                <div class="field">
                    <p>
                        <label for="atividadesecun">Atividade Secundária:</label>
                        <input name="atividade_secundaria" type="text">
                    </p>
                </div>
                <br>
                <!--Dado tipo empreendimento -->
                <div class="field">
                    <p>
                        <label for="tipo">Tipo:<br>  </label>
                        <input name="tipo" type="radio" value="Gastronomia">Gastronomia<br>
                        <input name="tipo" type="radio" value="Hospedagem">Hospedagem<br>
                        <input name="tipo" type="radio" value="Operadora">Operadora
                    </p>
                </div>
                <br>
                <!--Dado dias de atendimento -->
                <div class="field">
                    <p>
                        <label for="Diasatendi">Dias de atendimento: <br>  <br>  <br> <br> <br></label>
                        <input name="dia[]" type="checkbox" value="seg">Segunda-Feira<br>
                        <input name="dia[]" type="checkbox" value="ter">Terça-Feira<br>
                        <input name="dia[]" type="checkbox" value="qua">Quarta-Feira<br>
                        <input name="dia[]" type="checkbox" value="qui">Quinta-Feira<br>
                        <input name="dia[]" type="checkbox" value="sex">Sexta-Feira<br>
                        <input name="dia[]" type="checkbox" value="sab">Sábado<br>
                        <input name="dia[]" type="checkbox" value="dom">Domingo
                    </p>
                </div>


                <!--Dado Horario atendimento -->
                <div class="field">
                    <p>
                        <label for="horasatende">Horário de Atendimento:</label>
                        <br><input name="horario_atendimento[]" type="time"> Até ás:<input name="horario_atendimento[]" type="time">
                    </p>
                </div>
            </div>
            <br>
            <!--Botão para enviar os dados para o arquivo de cadastro no banco de dados -->
            <button type="submit" name="cadastrar" class="btn btn-outline-success">Cadastrar</button>
        </form>
    </div>
</body>

</html>
