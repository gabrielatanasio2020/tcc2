<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <?php
    include_once("../conexao.php");

    $cod_hospedagem = intval($_GET['cod']);
    $data_inicio = $_GET['datainicio'];
    $data_fim = $_GET['datafim'];


    $sql_code_busca_banco = "SELECT nacionalidade, data_entrada, data_saida, estado_moradia 
    FROM hospede
    WHERE data_entrada between '$data_inicio' and '$data_fim' and hospede.cod_hospedagem = '$cod_hospedagem';";

    $sql_retorno_informações_hospede = $conexao->query($sql_code_busca_banco) or die($conexao->error);
    ?>

    <!-- Mostrar os dados já atualizados pelos usuarios -->
    <!-- inicio -->

    <body class="bg-primary">
        <div class="container-fluid d-flex flex-column text-center align-items-center p-5">
            <div class="col-12 col-lg-5 p-2 bg-white border rounded">
                <div class="card p-0 border-0 rounded-0">
                    <!-- apresentação -->
                    <div class="card-header bg-white border-0 p-5">
                        <h5 class="mb-0">Registro(s) na data especificada</h5>
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
                        <input type="button" class="btn btn-secondary btn-block" value="Voltar" onClick="JavaScript: window.history.back();">
                        
                    </div>
                </div>
            </div>

        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>

</html>