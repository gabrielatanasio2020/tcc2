<!doctype html>
<html lang="pt-br">
<?php
include_once("conexao.php");
date_default_timezone_set("Brazil/East");
session_start();
$cod =  $_SESSION['UsuarioCOD'];
$today = date('d/m/Y');
$today2 = date("Y-m-d");
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="./javascript/index.js"></script>
    <title>Dados dos Hospedes</title>
</head>
<style>
    *{
        padding: 0;
    }
</style>
<body>

    <div class="container-fluid bg-primary d-flex flex-column justify-content-center align-items-center p-5">
        <!-- Aqui em cima           .        tentar colocar um azul clarinho     -->
        <div class="col-12 col-lg-5 p-2 bg-white border border-success rounded-lg">
            <div class="card p-5 border-0">
                <div class="card-header bg-white border-0">
                    <h5>Registrar Hóspedes</h5>
                </div>
                <div class="card-body">
                    <form action="./receptores/receptor_formulario_input.php" method="POST" id="formGuests">
                        <div class="form-group" id="guestForm">
                            <!--Aqui é a entrada da nacionalidade -->
                            <div class="input-control">
                                <label for="country" class="mb-0"><small>Pais de origem:</small></label>
                                <input type="text" name="country" placeholder="Preencher somente se hospede estrangeiro" class="form-control mb-3">
                            </div>
                            <!--Aqui é a estrada do campo Estado, caso brasileiro -->
                            <div class="input-control" id="districtInput">
                                <label for="country" class="mb-0"><small>Estado:</small></label>
                                <input type="text" name="district" placeholder="Preencher somente se hospede brasileiro" class="form-control mb-4 mt-0">
                            </div>
                            <!-- Data de entrada do hospede -->
                            <div class="input-control mb-3">
                                <label for="inputDate" class="mb-0"><small>Data de Entrada</small></label>
                                <input type="date" name="inputDate" placeholder="Data de entrada" class="form-control">
                            </div>
                            <!--Data de saida do hospede -->
                            <div class="input-control mb-4">
                                <label for="outputDate" class="mb-0"><small>Data de Saída</small></label>
                                <input type="date" name="outputDate" placeholder="Data de saída" class="form-control">
                            </div>
                            <!-- Aqui faz o envio dos dados para o arquivo receptor_formulario_input     onclick='handleSubmit'     -->
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                            <a href="./login_usuarios.php" class="btn btn-secondary btn-block" value="Voltar" >Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
            <hr>

            <!-- Parte de mostrar os registros  -->
            <?php
            $sql_code_busca_banco = "SELECT nacionalidade, data_entrada, data_saida, estado_moradia 
            FROM hospede 
            INNER JOIN empreendimento ON empreendimento.cod_hospedagem = hospede.cod_hospedagem
            WHERE hospede.data_registro = '$today2' and hospede.cod_hospedagem = (SELECT cod_hospedagem FROM empreendimento WHERE cod_usuario = '$cod');";

            $sql_retorno_informações_hospede = $conexao->query($sql_code_busca_banco) or die($conexao->error);
            ?>

            <!-- Mostrar os dados já atualizados pelos usuarios -->
            <!-- inicio -->
            <div class="card p-0 border-0 rounded-0">
                <!-- apresentação -->
                <div class="card-header bg-white border-0 p-5">
                    <h5 class="mb-0">Ultimos Registros</h5>
                </div>

                <div class="card-group">
                    <?php
                    while ($exibe_linha = $sql_retorno_informações_hospede->fetch_assoc()) {
                        // Todas funções mysql_fetch_* retornam uma única linha e avançam o cursor interno para o próximo registro.
                        // Para obter todos os registros, você precisa utiliza-las dentro de alguma estrutura de repetição.
                    ?>
                        <div class="card-body p-1">
                            <ul class="list-group rounded-0" style="border: 1px solid #98b89c; border-collapse: separate; ">
                                <li class="list-group-item" style="background-color: #d4ffd9;">
                                    <strong>
                                        <h6 class="mb-0">Nacionalidade:</h6>
                                    </strong>
                                    <small class="mt-0"><?php echo $exibe_linha['nacionalidade']; ?> </small>
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <h6 class="mb-0">Estado:</h6>
                                    </strong>
                                    <small class="mt-0"><?php echo $exibe_linha['estado_moradia']; ?></small>
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <h6 class="mb-0">Data Entrada:</h6>
                                    </strong>
                                    <small class="mt-0"><?php echo date("d-m-Y", strtotime($exibe_linha['data_entrada'])); ?></small>
                                </li>
                                <li class="list-group-item">
                                    <strong>
                                        <h6 class="mb-0">Data Saída:</h6>
                                    </strong>
                                    <small class="mt-0"><?php echo date("d-m-Y", strtotime($exibe_linha['data_saida'])); ?></small>
                                </li>
                            </ul>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>