﻿    <!doctype html>
    <html lang="pt-br">
    <!-- Seção de cadastro dos usuarios-->

    <head>
        <meta charset="utf-8">
        <title>Cadastro</title>
        <!--Link para o css da página -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <body class="bg-primary">
        <!-- Página para inserir os dados de cadastro do usuário na sua entrada no sistema -->

        <!-- AQUI EU ADICIONEI NA TABELA OS OUTROS DADOS -->
        <div class="container">

            <div class="container-fluid d-flex flex-column  align-items-center p-5">
                <div id="borda" class="col-12 col-lg-5 p-2 bg-white border border-success rounded">
                    <form id="contactform" action="receptores/receptor_cadastro.php" method="POST">
                        <div class="form-group">
                            <h3 class="text-center mb-3"> Dados de Cadastro</h3>
                            <br>
                            <!--Dado usuário -->
                            <div class="parte1">
                                <div class="field">
                                    <label for="usuario">Usuário:</label>
                                    <input class="form-control" required="required" name="usuario" type="text">

                                </div>

                                <!--Dado email -->
                                <div class="field">
                                    <p>
                                        <label for="email">Email:</label>
                                        <input class="form-control" name="email" type="email">
                                    </p>
                                </div>

                                <!--Dado senha -->
                                <div class="field">
                                    <p>
                                        <label for="senha">Senha:</label>
                                        <input class="form-control" required="required" name="senha" type="password">
                                    </p>
                                </div>

                                <!--Dado Capacidade máxima -->
                                <div class="field">
                                    <p>
                                        <label for="capacidade">Capacidade máxima:</label>
                                        <input class="form-control" name="capacidade" type="number" required="required">
                                    </p>
                                </div>

                            </div>
                            <div class="parte2">

                                <!--Dado CNPJ -->
                                <div class="field">
                                    <p>
                                        <label for="cnpj">CNPJ:</label>
                                        <input class="form-control" name="cnpj" type="text" maxlength="18" id="cnpj">
                                    </p>
                                </div>
                                <!--Dado nome -->
                                <div class="field">
                                    <p>
                                        <label for="Empresa">Empresa:</label>
                                        <input class="form-control" name="nome" type="text">
                                    </p>
                                </div>
                                <!--Dado titular -->
                                <div class="field">
                                    <p>
                                        <label for="titular">Titular:</label>
                                        <input class="form-control" name="titular" type="text">
                                    </p>
                                </div>
                                <!--Dado tipo empreendimento -->
                                <div class="field">
                                    <p>
                                        <label for="tipo">Tipo:</label>
                                        <select class="form-control" required="required" name=tipo>
                                            <option value="Hospedagem">Hospedagem</option>
                                            <option value="Gastronomia">Gastronomia</option>
                                            <option value="Operadora">Operadora</option>
                                        </select>
                                    </p>
                                </div>
                            </div>

                            <!--Botão para enviar os dados para o arquivo de cadastro no banco de dados -->
                            <button type="submit" name="cadastrar" class="btn btn-primary btn-block">Cadastrar</button>
                            <a href="./index.php" class="btn btn-secondary btn-block" value="Voltar">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>