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
                                    <h4 class="card-title">Listagem Clientes</h4>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <table class="table table-bordered data-table">
                                            <thead>
                                            <tr>
                                                <th width="10px">No</th>
                                                <th>Nome</th>
                                                <th width="100px">Ação</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                ajax: "{{ route('client.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
