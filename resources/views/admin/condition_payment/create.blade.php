@extends('admin.includes.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <form method="POST" action="{{ route('conditionpayment.store') }}">
                    @csrf
                    <section id="basic-buttons">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Cadastrar Condição de Pagamento</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="name">Nome</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="name"/>

                                                @error('name')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="name">Juros</label>
                                                <div class="input-group">
                                                    <input type="number" id="fees" name="fees" class="form-control">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                @error('fees')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="name">Multa</label>
                                                <div class="input-group">
                                                    <input type="number" id="assessment" name="assessment"
                                                           class="form-control">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                @error('assessment')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="name">Desconto</label>
                                                <div class="input-group">
                                                    <input type="number" id="discount" name="discount"
                                                           class="form-control">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                @error('discount')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="name">Qnt Parcelas</label>
                                                <input type="number" id="installment_amount" name="installment_amount"
                                                       class="form-control" readonly>
                                                @error('installment_amount')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-body">
                            <section class="form-control-repeater">
                                <div class="row">
                                    <!-- Invoice repeater -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Parcelas</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="lstPets"></div>

                                                <div class="row justify-content-between mt-2">
                                                    <div class="col-auto mr-auto">
                                                        <button class="btn btn-icon btn-primary" type="button"
                                                                name="add" id="add">
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Adicionar Parcela</span>
                                                        </button>

                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="btn btn-icon btn-success" type="submit">
                                                            <span>Cadastrar</span>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Invoice repeater -->
                                </div>
                            </section>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $.ajax({
                method: 'get',
                url: "{{ route('formpayment.getall') }}",
                success: function (data) {
                    formpayment = data
                },
                error: function (data) {
                    console.log(data);
                },
            });

            counter = 0;
            $("#add").on('click', function () {
                counter++;
                var html = '<div class="row" id="row_' + counter + '">';
                html +=
                    '<div class="col-xs-12 col-sm-2">' +
                    '<div class="form-group">' +
                    '<label for="nombre">N° Parcelas</label>' +
                    '<input type="text" class="form-control" id="installments' + counter + '" name="installments' + counter + '" value="' + counter + '">' +
                    '</div>' +
                    '</div>' +

                    '<div class="col-xs-12 col-sm-2">' +
                    '<div class="form-group">' +
                    '<label for="sexo">Prazo</label>' +
                    '<div class="input-group">'+
                    '<input type="text" class="form-control" id="number_days' + counter + '" name="number_days' + counter + '">' +
                    '<span class="input-group-text">Dias</span>'+
                    '</div>' +
                    '</div>' +
                    '</div>' +

                    '<div class="col-xs-12 col-sm-2">' +
                    '<div class="form-group">' +
                    '<label for="sexo">Porcentagem</label>' +
                    '<div class="input-group">'+
                    '<input type="text" class="form-control" id="percentage' + counter + '" name="percentage' + counter + '">' +
                    '<span class="input-group-text">%</span>'+
                    '</div>' +
                    '</div>' +
                    '</div>' +

                    '<div class="col-xs-12 col-sm-4">' +
                    '<div class="form-group">' +
                    '<label for="raca_id">Forma de Pagamento:</label>' +
                    '<select id="raca_id' + counter + '" name="raca_id' + counter +
                    '" class="select2 form-select" placeholder="Selecione">';
                        for (var i = 0; i < formpayment.length; i++) {
                            html += '<option value ="' + formpayment[i].id + '">' + formpayment[i].name + '</option >';
                        }
                html += '</select>' +
                    '</div></div>' +
                    '<div class="col-xs-12 col-sm-1">' +
                    '<button type="button" class="remover btn btn-danger waves-effect waves-float waves-light" id="rm' +
                    counter + '" data-counter="' + counter + '">Remover</button>' +
                    '</div>'
                '</div>' +
                '</div>';
                $("#lstPets").append(html);
                $("#count").val(counter);
                calcQntParcelas();
            });

            function calcQntParcelas(){
                $("#installment_amount").val(counter);
            }
        })

    </script>
@endsection
