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
                                    <h4 class="card-title">Editar Forma de Pagamento</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST"
                                          action="{{ route('country.update', $country->id) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="name">Nome do Pais</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="" aria-label="Name" value="{{$country->name}}"
                                                       aria-describedby="name"/>
                                                @error('name')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label class="form-label" for="name">Sigla</label>
                                                <div class="input-group">
                                                    <input type="text" id="acronym" name="acronym"
                                                           value="{{$country->acronym}}"
                                                           class="form-control">
                                                </div>
                                                @error('acronym')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-3">
                                                <label class="form-label" for="name">DDD</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">+</span>
                                                    <input type="number" id="DDD" name="DDD" value="{{$country->DDD}}"
                                                           class="form-control">
                                                </div>
                                                @error('DDD')
                                                <span
                                                    style="width: 100%; margin-top: 0.25rem;font-size: 0.857rem;color: #ea5455;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
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
