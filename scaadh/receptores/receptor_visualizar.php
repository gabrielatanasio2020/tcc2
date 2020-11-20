<?php 
include_once("../conexao.php");

    $sql_code = "
    SELECT * FROM usuario
    INNER JOIN empreendimento 
    WHERE (usuario.cod = empreendimento.cod_usuario);
    ";
    $sql_query = $conexao ->query($sql_code) or die ($conexao ->error);
    $linha = $sql_query ->fetch_assoc();
    
?>
