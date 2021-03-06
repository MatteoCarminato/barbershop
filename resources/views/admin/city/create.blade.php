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
                                        <h4 class="card-title">Cadastrar Cidade</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-1 col-md-5">
                                                <label class="form-label" for="name">Nome da Cidade</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="" aria-label="Name"
                                                       aria-describedby="name"/>

                                                @error('name')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="name">DDD</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">+</span>
                                                    <input type="number" id="DDD" name="DDD"
                                                           class="form-control">
                                                </div>
                                                @error('DDD')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-3">
                                                <label class="form-label" for="name">Estado</label>
                                                <div class="input-group">
                                                    <input type="text" id="state_name" name="state_name"
                                                           class="form-control" readonly>
                                                    <input type="hidden" id="state_id" name="state_id"
                                                           class="form-control">
                                                    <button type="button" class="input-group-text"
                                                            data-bs-toggle="modal" data-bs-target="#estado_show_modal">
                                                        <i data-feather='search'></i>
                                                    </button>
                                                </div>
                                                @error('state_id')
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

    @include('admin.includes.modals.cep')
@endsection
