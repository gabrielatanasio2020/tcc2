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

<body onload="toggleDefineForms()">
    <div class="container-fluid bg-light d-flex flex-column justify-content-center align-items-center" onload="toggleDefineForms()" style="height: 100vh">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-white border-0">
                    <h5>Cadastrar Hospedes</h5>
                </div>
                <div class="card-body">
                    <form id="defineForms">
                        <input name="guestsNumber" type="number" id="guestsNumber" placeholder="Número de hóspedes" class="form-control mb-3">
                        <button type="button" class="btn btn-primary btn-block mb-4" onclick="defineGuestsNumber()">Definir</button>
                    </form>
              
                    <form action="./receptores/receptor_formulario_input.php" method="POST" id="formGuests">
                        <div class="form-group mt-4" id="guestForm" style="display: none;">

                            <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                                <h6 id="currentForm" class="mb-4"></h6>
                                <button type="button" class="btn btn-primary btn-sm" onclick="resetVariables()">Iniciar Novamente</button>
                            </div>

                            <input name="country" type="text" id="country" placeholder="Nacionalidade" class="form-control mb-3">

                            <div class="form-group form-check mb-3">
                                <input name="isBrazilian" type="checkbox" class="form-check-input" id="isBrazilian" onclick="toggleDistrict()">
                                <label class="form-check-label" for="exampleCheck1">Se brasileiro</label>
                            </div>

                            <input name="district" type="text" id="district" placeholder="Estado" class="form-control mb-4" style="display: none;">

                            <div class="input-control mb-3">
                                <label for="inputDate" class="mb-0"><small>Data de Entrada</small></label>
                                <input name="inputDate" type="date" id="inputDate" placeholder="Data de entrada" class="form-control">
                            </div>

                            <div class="input-control mb-3">
                                <label for="outputDate" class="mb-0"><small>Data de Saída</small></label>
                                <input name="outputDate" type="date" id="outputDate" placeholder="Data de saída" class="form-control">
                            </div>

                            <button type="button" class="btn btn-primary btn-block" onclick='handleSubmit()'>Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>


