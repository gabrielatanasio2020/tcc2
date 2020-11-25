<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="./javascript/index.js"></script>

    <title>Hello, world!</title>
</head>

<body>
    <div class="container-fluid bg-light d-flex flex-column justify-content-center align-items-center p-5">
        <div class="col-12 col-lg-5 p-2 bg-white border rounded-lg">
            <div class="card p-5 border-0">
                <div class="card-header bg-white border-0">
                    <h5>Cadastrar Hóspedes</h5>
                </div>

                <div class="card-body">

                    <form action="./receptores/receptor_formulario_input.php" method="POST" id="formGuests">

                        <div class="form-group" id="guestForm">
<!--Aqui é a entrada da nacionalidade -->
                            <div class="input-control">
                                <label for="country" class="mb-0"><small>Pais de origem:</small></label>
                                <input type="text" name="country" placeholder="Nacionalidade" class="form-control mb-3">
                            </div>
<!--Aqui faz a checagem se o hospede é brasileiro, alterando o html atraves de um javascript -->
                            <div class="form-group form-check mt-0">
                                <input type="checkbox" class="form-check-input" id="isBrazilian" onclick="toggleDistrict()">
                                <label class="form-check-label" for="isBrazilian"><small>Brasileiro</small></label>
                            </div>
<!--Aqui é a estrada do campo Estado, caso brasileiro -->
                            <div class="input-control" id="districtInput" style="display: none;">
                                <label for="country" class="mb-0"><small>Estado</small></label>
                                <input type="text" name="district" placeholder="Estado" class="form-control mb-4 mt-0">
                            </div>
<!-- Data de entrada do hospede -->
                            <div class="input-control mb-3">
                                <label for="inputDate" class="mb-0"><small>Data de Entrada</small></label>
                                <input type="date" name="inputDate" placeholder="Data de entrada" class="form-control">
                            </div>
<!--Data de saida do hospede -->
                            <div class="input-control mb-4">
                                <label for="outputDate" class="mb-0"><small>Data de Saída</small></label>
                                <input type="date" name="outputDate" placeholder="Data de saída" class="form-control">
                            </div>
                            
<!-- Aqui faz o envio dos dados para o arquivo receptor_formulario_input     onclick='handleSubmit'     -->
                            <button type="submit" class="btn btn-primary btn-block" >Cadastrar</button>
                       
                        </div>
                    </form>
                </div>
            </div>
            <hr>



            <div class="card p-0 border-0 rounded-0">
                <div class="card-header bg-white border-0 p-5">
                    <h5 class="mb-0">Ultimos Registros</h5>
                    <small class="text-secondary">Data 23/11/2020</small>
                </div>
                <div class="card-body px-5">
                    <div class="row row-cols-1 row-cols-md-3">
                        <div class="col mb-4">
                            <div class="card p-0 border-0">
                                <div class="card-body p-0">
                                    <ul class="list-group rounded-0">
                                        <li class="list-group-item">
                                            <strong>
                                                <h6 class="mb-0">Bgs</h6>
                                            </strong>
                                            <small class="mt-0">Nacionalidade</small>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>
                                                <h6 class="mb-0">Bgs</h6>
                                            </strong>
                                            <small class="mt-0">Estado</small>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>
                                                <h6 class="mb-0">Bgs</h6>
                                            </strong>
                                            <small class="mt-0">Data Entrada</small>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>
                                                <h6 class="mb-0">Bgs</h6>
                                            </strong>
                                            <small class="mt-0">Data Saída</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>