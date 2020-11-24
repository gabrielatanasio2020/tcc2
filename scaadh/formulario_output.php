<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Informações dos HOSPEDES</title>
    <!--Link para o css da página -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

    <?php

    $repetition = $_POST['pessoas_semana'];
   ?> 
   

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2">
            
            <?php
            for ($i = 1; $i < $repetition; $i++) {
                echo ' 
                <div class="col mb-4">
                   <div class="card">
                       <div class="card-body">
                           <h5 class="card-title">Hospede numero</h5>
                           <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                       </div>
                   </div>
               </div>'  ;
            }
            ?>
        </div>
    </div>

</body>

</html>