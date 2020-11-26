<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once("../conexao.php");

$data_inicio = $_POST['dateini'];
$data_fim = $_POST['datefini'];


//Busca do cod hospedagem para descobrir quais hospegens estão encaixadas na seleção
$sql_code = "SELECT cod_hospedagem FROM hospede where data_entrada between '$data_inicio' and '$data_fim';";

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

            <table cellpadding=10 class="table table-light border-0">
                <tr>
                    <td>Titular </td>
                    <td>Nome </td>
                    <td>Tipo</td>
                    <td>CNPJ </td>
                    <td>Acão </td>
                </tr>
                <?PHP
                while ($hospedagens_afetadas_cod = $sql_query->fetch_assoc()) { {
                        $sql_code2 = "SELECT * FROM empreendimento WHERE cod_hospedagem = '$hospedagens_afetadas_cod';";
                        $sql_query2 = $conexao->query($sql_code2) or die($conexao->error);

                ?>
                        <?php do { ?>
                            <tr>
                                <td><?php echo $linha['titular'];  ?></td>
                                <td><?php echo $linha['email'];    ?></td>
                                <td><?php echo $linha["tipo"];     ?></td>
                                <td><?php echo $linha["cnpj"];     ?></td>
                                <td>
                                    <a href="receptores/receptor_deleta.php?cod=<?php echo $linha["cod"]; ?>"><button type="button" class="btn btn-danger">Deletar</button></a>
                                </td>

                            </tr>
                        <?php  } while ($linha = $sql_query->fetch_assoc()); ?>
                <?php
                    }
                    while ($linha = $sql_query2->fetch_assoc());
                };
                ?>
            </table>

        </div>
    </div>
</body>

</html>