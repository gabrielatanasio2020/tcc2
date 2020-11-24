<body onload="toggleDefineForms()">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" onload="toggleDefineForms()" style="height: 100vh">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5>Cadastar Hospedes</h5>
                </div>
                <div class="card-body">
                    <form id="defineForms">
                        <input type="number" id="guestsNumber" placeholder="Número de hóspedes" class="form-control mb-3">
                        <button type="button" class="btn btn-primary btn-block mb-4" onclick="defineGuestsNumber()">Definir</button>
                    </form>

                    <form action="." method="POST" id="formGuests">
                        <div class="form-group mt-4" id="guestForm" style="display: none;">

                            <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                                <h6 id="currentForm" class="mb-4"></h6>
                                <button type="button" class="btn btn-primary btn-sm" onclick="resetVariables()">Iniciar Novamente</button>
                            </div>

                            <input type="text" id="country" placeholder="Nacionalidade" class="form-control mb-3">

                            <div class="form-group form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="isBrazilian" onclick="toggleDistrict()">
                                <label class="form-check-label" for="exampleCheck1">Se brasileiro</label>
                            </div>

                            <input type="text" id="district" placeholder="Estado" class="form-control mb-4" style="display: none;">

                            <div class="input-control mb-3">
                                <label for="inputDate" class="mb-0"><small>Data de Entrada</small></label>
                                <input type="date" id="inputDate" placeholder="Data de entrada" class="form-control">
                            </div>

                            <div class="input-control mb-3">
                                <label for="outputDate" class="mb-0"><small>Data de Saída</small></label>
                                <input type="date" id="outputDate" placeholder="Data de saída" class="form-control">
                            </div>

                            <button class="btn btn-primary btn-block">Cadastrar</button>
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