<!DOCTYPE html>
<?php
include_once("conexao.php");

$sql_code = "
    SELECT * FROM usuario
    INNER JOIN empreendimento
    WHERE (usuario.cod = empreendimento.cod_usuario);
    ";

$sql_query = $conexao->query($sql_code) or die($conexao->error);

$linha = $sql_query->fetch_assoc();
?>

<html lang="pt-br">

<!-- PÁGINA DEDICADA A VISUALIZAR OS DADOS DO USUÁRIO  -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar dados</title>

    <link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body class="bg-primary">
    <div class="mx-auto p-5">
        <nav class="navbar navbar-light bg-success" style="border-top-right-radius:7px; border-top-left-radius:7px;">
            <a class="navbar-brand text-light">Usuários cadastrados no sistema</a>
            <a href="./login.php" class="btn btn-secondary">Voltar</a>
        </nav>


        <table cellpadding=10 class="table table-light border-0" style="border-bottom-right-radius:7px; border-bottom-left-radius:7px;">

            <tr>
                <td>Usuario </td>
                <td>Email </td>
                <td>Tipo de Atividade </td>
                <td>CNPJ </td>
                <td style="width:20%;">Ação</td>

            </tr>
            <?php
            if ($linha <= 0) { ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php } else {
                do {
                ?>
                    <tr>
                        <td><?php echo $linha['usuario']; ?></td>
                        <td><?php echo $linha['email']; ?></td>
                        <td><?php echo $linha["tipo"]; ?></td>
                        <td><?php echo $linha["cnpj"]; ?></td>
                        <td>
                            <a href="editarcadastro.php?cod=<?php echo $linha['cod_usuario']; ?>"><button type="button" class="btn btn-warning">Editar/visualizar</button></a>



                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm">Excluir</button>


                            <div class="modal fade" id="confirm" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p> Você quer deletar a informação?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="receptores/receptor_deleta.php?cod=<?php echo $linha["cod_usuario"]; ?>"><button type="button" class="btn btn-danger">Deletar</button></a>
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </td>

                    </tr>
            <?php
                } while ($linha = $sql_query->fetch_assoc());
            }
            ?>

        </table>
    </div>




</body>

</html>