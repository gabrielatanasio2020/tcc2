<?php
include_once("../conexao.php");

session_start();

$nacionalidade = $_POST['country'];
$data_entrada = $_POST['inputDate'];
$data_saida = $_POST['outputDate'];
$estado_moradia = $_POST['district'];
$cod =  $_SESSION['UsuarioCOD'];


//Pegando o valor do cod_hospedagem
$sql_code_hospedagem = "SELECT * FROM scaadh_melhorado.empreendimento
WHERE '$cod' = cod_usuario;";
$sql_query_cod_hospedagem = $conexao->query($sql_code_hospedagem) or die($conexao->error);
$linha = $sql_query_cod_hospedagem->fetch_assoc();
$usando = $linha['cod_hospedagem'];


$today = date('Y-m-d H:i:s');

if (empty($data_entrada) || empty($data_saida)) {
    echo '<script>
    alert("Preencha todos os campos!")
    </script>';

    header("Location: ../formulario_input.php"); 


} else {
    $sql_code = "INSERT into hospede (nacionalidade, cod_hospedagem, data_registro, data_entrada, data_saida, estado_moradia) 
        values ('$nacionalidade','$usando', '$today' ,'$data_entrada', '$data_saida', '$estado_moradia');
        ";

    if ($conexao->query($sql_code) === TRUE) {
        echo "Cadastro concluido com sucesso!<br>";
        header("Location: ../formulario_input.php");
    } else {
        echo "Error: " . $sql_code . "<br>" . $conexao->error;
    }
    $conexao->close();
}


?>