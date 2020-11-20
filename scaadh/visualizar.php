<!DOCTYPE html>
<?php 
include_once("conexao.php");

    $sql_code = "
    SELECT * FROM usuario
    INNER JOIN empreendimento, localizacao
    WHERE (usuario.cod = empreendimento.cod_usuario) and (empreendimento.cod_localizacao=localizacao.cod);
    ";
    $sql_query = $conexao ->query($sql_code) or die ($conexao ->error);
    $linha = $sql_query ->fetch_assoc();
?>

<html lang="pt-br">

<!-- PÁGINA DEDICADA A VISUALIZAR OS DADOS DO USUÁRIO  -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
        h1 {

            display: inline;
        }

        body {

            background-color: lightgray;
        }

    </style>
</head>

<body>
    <h1>Usuários </h1> <input type="search" placeholder="Pesquisar Usuário"> <button type="button" class="btn btn-outline-success">Pesquisar</button><br>
    <br>
    <p></p>

    <table border=1 cellpadding=10>

        <tr>
            <td>Usuario </td>
            <td>Email</td>
            <td>Tipo de Atividade</td>
            <td>Cadastur</td>
            <td>CNPJ </td>
            <td>Município</td>
            <td>Número</td>
            <td>Bairro</td>
            <td>Acão </td>
        </tr>
        <?php do { ?>
        <tr>
            <td><?php echo $linha['usuario'];  ?></td>
            <td><?php echo $linha['email'];    ?></td>
            <td><?php echo $linha["tipo"];     ?></td>
            <td><?php echo $linha["cadastur"]; ?></td>
            <td><?php echo $linha["cnpj"];     ?></td>
            <td><?php echo $linha["municipio"];?></td>
            <td><?php echo $linha["numero"];   ?></td>
            <td><?php echo $linha["bairro"];   ?></td>

            <td>
                <a href="editarcadastro.php?cod=<?php echo $linha['cod']; ?>&local=<?php echo $linha['cod_localizacao']?>"><button type="button" class="btn btn-outline-success">Editar</button></a>
                <a href="receptores/receptor_deleta.php?cod=<?php echo $linha["cod"];?>"><button type="button" class="btn btn-outline-success">Deletar</button></a>
            </td>

        </tr>
        <?php  } while ($linha = $sql_query ->fetch_assoc()); ?>

    </table>


</body>

</html>