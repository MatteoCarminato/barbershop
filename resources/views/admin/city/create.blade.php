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
                                                    <button type="button" class="input-group-text" data-bs-toggle="modal" data-bs-target="#animation">
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

    <!-- Modal -->
    <div class="modal text-start" id="animation" tabindex="-1" aria-labelledby="myModalLabel6" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel6">Selecione o País</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-inline" method="GET">
                        <div class="form-group mb-2">
                            <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                            <input type="text" class="form-control" id="filter" name="filter" placeholder="Procurar pais">
                        </div>
                        <button type="submit" class="btn btn-default mb-2">Filter</button>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 100%;">Pais</th>
                                    <th >Selecionar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($states->count() == 0)
                                    <tr>
                                        <td colspan="5">No products to display.</td>
                                    </tr>
                                @endif

                                @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $state->id }}</td>
                                        <td>{{ $state->name }}</td>
                                        <td class="float-end"><button class="btn btn-sm btn-danger select_state" data-value="{{$state->name}}" value="{{ $state->id}}"> Selecionar</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $states->links() }}

                            <p>
                                Mostrando {{$states->count()}} of {{ $states->total() }} país(s).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button"  class="btn btn-success" > Cadastrar País</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                oLanguage: {
                    sProcessing: '<img src="#">'
                },
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json'
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('state.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                ]
            });
        });
    </script>
    <script>
        $(".select_state").on('click', function () {
            let state = this.getAttribute('data-value');
            let state_id = this.value;

            $('#state_name').val(state);
            $('#state_id').val(state_id);

            var myModalEl = document.getElementById('animation');
            var modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();

        });
    </script>
@endsection
