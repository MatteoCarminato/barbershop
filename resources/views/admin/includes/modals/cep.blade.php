<div class="modal text-start" id="estado_show_modal" tabindex="-1" aria-labelledby="myModalLabel6"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Selecione o Estado</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" method="GET">
                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label for="filter" class="">Filter</label>
                            <input type="text" class="form-control" id="filter" name="filter"
                                   placeholder="Procurar estado">
                        </div>
                        <div class="mb-1 col-md-6 align-self-end">
                            <button type="button" class="btn btn-warning search"><i data-feather='search'></i>
                            </button>
                            <button type="button" class="btn btn-success col-9" data-bs-toggle="modal"
                                    data-bs-target="#estado_create_modal"> Cadastrar Estado
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="lista_estados">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 100%;">Estado</th>
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody id="tbodyid">
                            @if ($states->count() == 0)
                                <tr>
                                    <td colspan="5">No products to display.</td>
                                </tr>
                            @endif

                            @foreach ($states as $state)
                                <tr>
                                    <td>{{ $state->id }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td class="float-end">
                                        <button class="btn btn-sm btn-danger select_state"
                                                data-value="{{$state->name}}" value="{{ $state->id}}"> Selecionar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal text-start" id="estado_create_modal" tabindex="-1" aria-labelledby="myModalLabel6"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Selecione o Estado</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="name">Nome do Estado</label>
                            <input type="text" id="name_estado" name="name_estado" class="form-control"
                                   placeholder="" aria-label="Name"
                                   aria-describedby="name"/>

                            @error('name')
                            <span
                                style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="name">Sigla</label>
                            <div class="input-group">
                                <input type="text" id="acronym_estado" name="acronym_estado"
                                       class="form-control">
                            </div>
                            @error('acronym')
                            <span
                                style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="name">País</label>
                            <div class="input-group">
                                <input type="text" id="country_name" name="country_name"
                                       class="form-control" readonly>
                                <input type="hidden" id="country_id_estado" name="country_id_estado"
                                       class="form-control" value="">
                                <button type="button" class="input-group-text" data-bs-toggle="modal"
                                        data-bs-target="#pais_show_modal">
                                    <i data-feather='search'></i>
                                </button>
                            </div>
                            @error('country_id')
                            <span
                                style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary cadastrar_estado_button"
                                id="cadastrar_estado_button">Cadastrar
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!--    País -->

<div class="modal text-start" id="pais_show_modal" tabindex="-1" aria-labelledby="myModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Selecione o Pais</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" method="GET">
                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label for="filter" class="">Filter</label>
                            <input type="text" class="form-control" id="filter" name="filter"
                                   placeholder="Procurar pais">
                        </div>
                        <div class="mb-1 col-md-6 align-self-end">
                            <button type="button" class="btn btn-warning search"><i data-feather='search'></i>
                            </button>
                            <button type="button" class="btn btn-success col-9" data-bs-toggle="modal"
                                    data-bs-target="#pais_create_modal"> Cadastrar Pais
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="lista_pais">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 100%;">Pais</th>
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody id="tbodyid_pais">
                            @if ($countries->count() == 0)
                                <tr>
                                    <td colspan="5">No products to display.</td>
                                </tr>
                            @endif

                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td class="float-end">
                                        <button class="btn btn-sm btn-danger select_country"
                                                data-value="{{$country->name}}" value="{{ $country->id}}">
                                            Selecionar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal text-start" id="pais_create_modal" tabindex="-1" aria-labelledby="myModalLabel6"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Cadastrar o Pais</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="name">Nome do Pais</label>
                            <input type="text" id="name_country" name="name_country" class="form-control"
                                   placeholder="" aria-label="Name"
                                   aria-describedby="name"/>

                            @error('name')
                            <span
                                style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="name">Sigla</label>
                            <div class="input-group">
                                <input type="text" id="acronym_country" name="acronym_country"
                                       class="form-control">
                            </div>
                            @error('acronym')
                            <span
                                style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-1 col-md-4">
                            <label class="form-label" for="name">DDD</label>
                            <div class="input-group">
                                <input type="text" id="ddd_country" name="ddd_country"
                                       class="form-control">
                            </div>
                            @error('acronym')
                            <span
                                style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary cadastrar_pais_button"
                                id="cadastrar_pais_button">Cadastrar
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(".select_state").on('click', function () {
        let state = this.getAttribute('data-value');
        let state_id = this.value;

        $('#state_name').val(state);
        $('#state_id').val(state_id);

        var myModalEl = document.getElementById('estado_show_modal');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();

    });

    $(".select_country").on('click', function () {
        let state = this.getAttribute('data-value');
        let state_id = this.value;

        $('#country_name').val(state);
        $('#country_id').val(state_id);

        var myModalEl = document.getElementById('pais_show_modal');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();

    });

</script>
<script>
    $("#cadastrar_estado_button").on('click', function () {
        let name = $('#name_estado').val();
        let acronym = $('#acronym_estado').val();
        let country_id = $('#country_id_estado').val();
        $.ajax({
            url: "{{route('state.store')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
                acronym: acronym,
                country_id: country_id,
            },
            success: function (response) {
                //arrumar para aparecer os novos estado no lugar correto
                data = response.data;
                $("#tbodyid").empty();
                for (var i = 0; i < data.length; i++) {
                    $('#lista_estados').append('' +
                        '<tr>' +
                        '     <td>' + data[i].id + '</td>' +
                        '     <td>' + data[i].name + '</td>' +
                        '    <td class="float-end">' +
                        '        <button class="btn btn-sm btn-danger select_state"' +
                        '            data-value="' + data[i].name + '" value="' + data[i].id + '"> Selecionar' +
                        '         </button>' +
                        '   </td>' +
                        '</tr>');
                }

                var myModalEl = document.getElementById('estado_create_modal');
                var modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();

                $(".select_state").on('click', function () {
                    let state = this.getAttribute('data-value');
                    let state_id = this.value;

                    $('#state_name').val(state);
                    $('#state_id').val(state_id);

                    var myModalEl = document.getElementById('estado_show_modal');
                    var modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();

                });
            },
            error: function (response) {
                alert("nao foi possivel cadastrar")
            },
        });
    });
</script>

{{--    PAÍS --}}
<script>
    $("#cadastrar_pais_button").on('click', function () {
        let name = $('#name_country').val();
        let acronym = $('#acronym_country').val();
        let ddd = $('#ddd_country').val();

        $.ajax({
            url: "{{route('country.store')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
                acronym: acronym,
                DDD: ddd,
            },
            success: function (response) {
                //arrumar para aparecer os novos estado no lugar correto
                data = response.data;
                $("#tbodyid_pais").empty();
                for (var i = 0; i < data.length; i++) {
                    $('#lista_pais').append('' +
                        '<tr>' +
                        '     <td>' + data[i].id + '</td>' +
                        '     <td>' + data[i].name + '</td>' +
                        '    <td class="float-end">' +
                        '        <button class="btn btn-sm btn-danger select_country"' +
                        '            data-value="' + data[i].name + '" value="' + data[i].id + '"> Selecionar' +
                        '         </button>' +
                        '   </td>' +
                        '</tr>');
                }

                var myModalEl = document.getElementById('pais_create_modal');
                var modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();

                $(".select_country").on('click', function () {
                    let country = this.getAttribute('data-value');
                    let country_id = this.value;

                    $('#country_name').val(country);
                    $('#country_id_estado').val(country_id);

                    var myModalEl = document.getElementById('pais_show_modal');
                    var modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();

                });
            },
            error: function (response) {
                alert("nao foi possivel cadastrar")
            },
        });
    });

    $(".select_country").on('click', function () {
        let country = this.getAttribute('data-value');
        let country_id = this.value;

        $('#country_name').val(country);
        $('#country_id_estado').val(country_id);

        var myModalEl = document.getElementById('pais_show_modal');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();

    });
</script>
