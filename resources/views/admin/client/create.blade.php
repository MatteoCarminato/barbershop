@extends('admin.includes.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-buttons">
                    <form method="POST" action="{{ route('city.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Cadastrar Cliente</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row custom-options-checkable g-1">
                                                    <div class="col-md-6">
                                                        <input class="custom-option-item-check" type="radio"
                                                               name="type"
                                                               id="customOptionsCheckableRadiosWithIcon2"
                                                               onclick="handleClick(this);"
                                                               value="1"/>
                                                        <label
                                                            class="custom-option-item text-center text-center p-1"
                                                            for="customOptionsCheckableRadiosWithIcon2">
                                                            <i data-feather="user"
                                                               class="font-large-1 mb-75"></i>
                                                            <span
                                                                class="custom-option-item-title h4 d-block">Pessoa Física</span>
                                                            <small>Selecione essa opção para cadastrar pessoa
                                                                física.</small>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="custom-option-item-check" type="radio"
                                                               name="type"
                                                               id="customOptionsCheckableRadiosWithIcon3"
                                                               onclick="handleClick(this);"
                                                               value="2"/>
                                                        <label class="custom-option-item text-center p-1"
                                                               for="customOptionsCheckableRadiosWithIcon3">
                                                            <i data-feather="users"
                                                               class="font-large-1 mb-75"></i>
                                                            <span
                                                                class="custom-option-item-title h4 d-block">Pessoa Jurídica</span>
                                                            <small>Selecione essa opção para cadastrar cliente
                                                                jurídica.</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <label class="form-label" for="name">Nome Cliente</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="name"/>

                                                @error('name')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="cpf">CPF</label>
                                                <input type="text" id="cpf" name="cpf" class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="cpf"/>

                                                @error('cpf')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="rg">RG</label>
                                                <input type="text" id="rg" name="rg" class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="rg"/>

                                                @error('rg')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="birth_date">Data Nascimento</label>
                                                <input type="date" id="birth_date" name="birth_date"
                                                       class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="birth_date"/>

                                                @error('birth_date')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Endereço</div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="cep">CEP</label>
                                                <input type="text" id="cep" name="cep" class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="cep"/>

                                                @error('cep')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="rg">Logradouro</label>
                                                <input type="text" id="rg" name="rg" class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="rg"/>

                                                @error('cpf')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="number">Numero</label>
                                                <input type="text" id="number" name="number"
                                                       class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="number"/>

                                                @error('number')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-3">
                                                <label class="form-label" for="district">Bairro</label>
                                                <input type="text" id="district" name="district"
                                                       class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="district"/>

                                                @error('district')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-3">
                                                <label class="form-label" for="complement">Complemento</label>
                                                <input type="text" id="complement" name="complement"
                                                       class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="complement"/>

                                                @error('complement')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script>
        // var currentValue = 0;
        //
        // function handleClick(myRadio) {
        //     alert('Old value: ' + currentValue);
        //     alert('New value: ' + myRadio.value);
        //     currentValue = myRadio.value;
        // }
    </script>
@endsection
