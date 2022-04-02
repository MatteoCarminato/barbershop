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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Cadastrar empresa</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('company.store') }}">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="name">Nome</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                           placeholder="Bar Exemplo" aria-label="Name"
                                                           aria-describedby="name"
                                                           value="{{$company->name}}"
                                                    />

                                                    @error('name')
                                                    <span
                                                        style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="name_franchises">Região
                                                        Franquia</label>
                                                    <input type="text" id="name_franchises" name="name_franchises"
                                                           class="form-control" placeholder="Shopping" aria-label="Name"
                                                           aria-describedby="name_franchises"
                                                           value="{{$company->name_franchises}}"
                                                    />

                                                    @error('name_franchises')
                                                    <span
                                                        style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="code_company">Codigo Company</label>
                                                <input type="text" id="code_company" name="code_company"
                                                       class="form-control" placeholder="Name" aria-label="Name"
                                                       aria-describedby="code_company"
                                                       value="{{$company->code_company}}"
                                                />
                                                @error('code_company')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="description">Descrição</label>
                                                <input type="text" id="description" name="description"
                                                       class="form-control" placeholder="Name" aria-label="Name"
                                                       aria-describedby="description"
                                                       value="{{$company->description}}"
                                                />

                                                @error('description')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
