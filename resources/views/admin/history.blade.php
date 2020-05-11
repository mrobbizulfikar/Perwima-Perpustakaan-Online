@extends('layouts.app')

@section('head')
@endsection

@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title pull-left">Riwayat Transaksi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="data-table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Nama Peminjam
                                                </th>
                                                <th>
                                                    ISBN Buku
                                                </th>
                                                <th>
                                                    Judul Buku
                                                </th>
                                                <th>
                                                    Tanggal Pinjam
                                                </th>
                                                <th>
                                                    Tanggal Kembali
                                                </th>
                                                <th>
                                                    Tanggal Diserahkan
                                                </th>
                                                <th>
                                                    Denda
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.history.index") }}',
                columns: [
                    { data: 'id', name: 'id', class: 'text-center' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'book.isbn', name: 'book.isbn' },
                    { data: 'book.title', name: 'book.title' },
                    { data: 'borrow_date', name: 'borrow_date' },
                    { data: 'return_date', name: 'return_date' },
                    { data: 'submit_date', name: 'submit_date' },
                    { data: 'fine', name: 'fine', class: 'text-right' }
                ],
                
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });

            table.button().add(4, {
                text: 'RELOAD',
                action: function ( e, dt, button, node, config ) {
                    dt.ajax.reload();
                }
            } );
        });
    </script>
@endpush