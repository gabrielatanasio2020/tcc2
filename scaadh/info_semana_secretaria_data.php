<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datas de Busca</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <div class="container-fluid d-flex flex-column text-center align-items-center p-5">
        <div class="col-12 col-lg-5 p-2 bg-white border rounded">
            <div>
                <br>
                <h4>Informe o periodo que deseja buscar</h4>
                <br>
            </div>
            <form action="./receptores/receptor_semana_data.php" method="POST">

                <div class="input-control mb-3">
                    <label class="mb-0">Informe a data de inicio de busca:</label>
                    <input type="date" class="form-control" name="dateini" required>
                </div>
                <div class="input-control mb-3">
                    <label class="mb-0">Informe a data de fim de busca:</label>
                    <input type="date" class="form-control" name="datefini" required>
                    
                </div>
                

                <button type="submit"class="btn btn-primary btn-block">Buscar</button>
                <a href="./login.php" class="btn btn-secondary btn-block" value="Voltar">Voltar</a> 
            </form>
        </div>
    </div>
</body>

</html>