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
                                                <form action="#" class="invoice-repeater">
{{--                                                    <div data-repeater-list="invoice">--}}
{{--                                                        <div data-repeater-item>--}}
{{--                                                            <div class="row d-flex align-items-end">--}}
{{--                                                                <div class="col-md-4 col-12">--}}
{{--                                                                    <div class="mb-1">--}}
{{--                                                                        <label class="form-label" for="itemname">Numero--}}
{{--                                                                            Parcela</label>--}}
{{--                                                                        <input type="text" class="form-control"--}}
{{--                                                                               id="installments" name="installments"--}}
{{--                                                                               aria-describedby="itemname"--}}
{{--                                                                               placeholder="1º"/>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="col-md-2 col-12">--}}
{{--                                                                    <div class="mb-1">--}}
{{--                                                                        <label class="form-label"--}}
{{--                                                                               for="itemcost">Prazo em dias</label>--}}
{{--                                                                        <input type="number" class="form-control"--}}
{{--                                                                               id="itemcost" aria-describedby="itemcost"--}}
{{--                                                                               placeholder="32"/>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="col-md-2 col-12">--}}
{{--                                                                    <div class="mb-1">--}}
{{--                                                                        <label class="form-label" for="itemquantity">Porcentagem</label>--}}
{{--                                                                        <div class="input-group">--}}
{{--                                                                            <input type="number" id="discount"--}}
{{--                                                                                   name="discount"--}}
{{--                                                                                   class="form-control">--}}
{{--                                                                            <span class="input-group-text">%</span>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="col-md-2 col-12">--}}
{{--                                                                    <div class="mb-1">--}}
{{--                                                                        <label class="form-label"--}}
{{--                                                                               for="staticprice">Forma de--}}
{{--                                                                            Pagamento</label>--}}
{{--                                                                        <select class="select2 form-select"--}}
{{--                                                                                id="select2-basic">--}}
{{--                                                                            @foreach ($forms_payment as $form_payment)--}}
{{--                                                                                <option--}}
{{--                                                                                    value="{{$form_payment->id}}">{{$form_payment->name}}</option>--}}
{{--                                                                            @endforeach--}}
{{--                                                                        </select>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="col-md-2 col-12 mb-50">--}}
{{--                                                                    <div class="mb-1">--}}
{{--                                                                        <button--}}
{{--                                                                            class="btn btn-outline-danger text-nowrap px-1"--}}
{{--                                                                            data-repeater-delete type="button">--}}
{{--                                                                            <i data-feather="x" class="me-25"></i>--}}
{{--                                                                            <span>Delete</span>--}}
{{--                                                                        </button>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <hr/>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="row justify-content-between">
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
                                                </form>
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
@endsection
