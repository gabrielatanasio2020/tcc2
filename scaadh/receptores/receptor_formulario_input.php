<?php
include_once("../conexao.php");


$nacionalidade = $_POST['country'];
$data_entrada = $_POST['inputDate'];
$data_saida = $_POST['outputDate'];
$estado_moradia = $_POST['district'];
$cod = 1;


if (empty($data_entrada) || empty($data_saida)) {
    echo '<script>
    alert("Preencha todos os campos!")
    </script>';

  //  header("Location: ../formulario_input.php");
    
  


} else {
    $sql_code = "insert into hospede (nacionalidade, cod_hospedagem, data_entrada, data_saida, estado_moradia) 
        values ('$nacionalidade','$cod', '$data_entrada', '$data_saida', '$estado_moradia');
        ";

    if ($conexao->query($sql_code) === TRUE) {
        echo "Cadastro concluido com sucesso!<br>";
      //  header("Location: ../formulario_input.php");
    } else {
        echo "Error: " . $sql_code . "<br>" . $conexao->error;
    }
    $conexao->close();
}
