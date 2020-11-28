<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once("../conexao.php");

$data_inicio = $_POST['dateini'];
$data_fim = $_POST['datefini'];


//Busca do cod hospedagem para descobrir quais hospegens estão encaixadas na seleção
$sql_code = "SELECT cod_hospedagem FROM hospede where data_entrada between '$data_inicio' and '$data_fim' group by cod_hospedagem;";
//executa a busca
$sql_query = $conexao->query($sql_code) or die($conexao->error);

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedagens com hospedes nessa data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <div class="container-fluid d-flex flex-column text-center align-items-center p-5">
        <div class="col-12 col-lg-5 p-2 bg-white border rounded-lg">
            <nav class="navbar navbar-light bg-success">
                <a class="navbar-brand text-light">Usuários</a>

            </nav>


            <table cellpadding=2 class="table table-light border-0">
                <tr>
                    <td>Titular </td>
                    <td>Email</td>
                    <td>Tipo</td>
                    <td>CNPJ</td>
                    <td>Acão</td>
                </tr>
                <?PHP

                // Todas funções mysql_fetch_* retornam uma única linha e avançam o cursor interno para o próximo registro.
                // Para obter todos os registros, você precisa utiliza-las dentro de alguma estrutura de repetição.


                while ($cada_hospedagem_recebeu = $sql_query->fetch_assoc()) { // Obtém os dados da linha atual e avança para o próximo registro
                    //Pegar os dados de cada hospedagem que recebeu e imprimir a função na tela.
                    //para fazer isso vou passar de array para string 
                    $array_to_string = $cada_hospedagem_recebeu['cod_hospedagem'];

                    $pegar_dados_empreendimento = "SELECT * FROM empreendimento WHERE cod_hospedagem = '$array_to_string';";
                    $informacoes_cada_empreendimento = $conexao->query($pegar_dados_empreendimento) or die($conexao->error);
                    
                    // while para mostrar cada empreendimento
                    while ($informacoes_cada_empreendimento = $sql_query->fetch_assoc()) {

                ?>
                        <tr>
                            <td><?php echo $informacoes_cada_empreendimento['titular'];  ?></td>
                            <td><?php echo $informacoes_cada_empreendimento['email'];    ?></td>
                            <td><?php echo $informacoes_cada_empreendimento["tipo"];     ?></td>
                            <td><?php echo $informacoes_cada_empreendimento["cnpj"];     ?></td>
                            <td>
                                <a href="receptores/receptor_usuario_especifico.php?cod=<?php echo $informacoes_cada_empreendimento["cod_hospedagem"]; ?>"> <button type="button" class="btn btn-primary">Hospedes</button></a>
                            </td>
                        </tr>

                <?php
                    }
                }

                ?>

            </table>

        </div>
    </div>
</body>

</html>