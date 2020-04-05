@extends('layouts.app')

@section('head')
@endsection

@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title pull-left">Sirkulasi Peminjaman dan Pengembalian</h4>
                                <button class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light" id="addItem">TAMBAH BARU </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data-table">
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
                                                    Denda
                                                </th>
                                                <th>
                                                    Status
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

            <div class="modal fade" id="ajaxModel" aria-hidden="true" data-toggle="modal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="modelHeading"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form id="itemForm" name="itemForm" class="form-horizontal">
                                <input type="hidden" name="item_id" id="item_id">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="user_id" class="col-sm-2">Peminjam</label>
                                            <div class="col-sm-12">
                                                <select class="form-control searchableSelect py-0" style="width: 100% !important" id="user_id" name="user_id">
                                                    <option value="" selected disabled>Pilih User</option>
                                                    @foreach($user as $fu)
                                                        <option value="{{ $fu->id }}">{{ $fu->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <label for="book_id" class="col-sm-2">Buku</label>
                                            <div class="col-sm-12">
                                                <select class="form-control searchableSelect py-0" style="width: 100% !important" id="book_id" name="book_id">
                                                    <option value="" selected disabled>Pilih Buku</option>
                                                    @foreach($book as $fb)
                                                        <option value="{{ $fb->id }}">{{ $fb->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="category_id" class="col-sm-2">Tanggal&nbsp;Pinjam</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required="">
                                            </div>
                                            <br>
                                            <label for="category_id" class="col-sm-2">Tanggal&nbsp;Kembali</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="return_date" name="return_date" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addMonth(1)->toDateString())) }}" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="float: right">
                                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('script')
    <script>
        $(function() {
            $(document).ready(function() {
                $('.searchableSelect').select2();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.transaction.index") }}',
                columns: [
                    { data: 'id', name: 'id', class: 'text-center' },
                    { data: 'user.name', name: 'user_id' },
                    { data: 'book.isbn', name: 'isbn' },
                    { data: 'book.title', name: 'book_id' },
                    { data: 'borrow_date', name: 'borrow_date' },
                    { data: 'return_date', name: 'return_date' },
                    { data: 'fine', name: 'fine', class: 'text-right' },
                    { data: 'option', name: 'option', class: 'text-center', orderable: false, searchable: false }
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
            
            $('#addItem').click(function () {
                $('#saveBtn').val("create-item");
                $('#item_id').val('');
                $('#itemForm').trigger("reset");
                $('#modelHeading').html("Tambah Baru");
                $('#ajaxModel').modal('show');
            });
            
            $('body').on('click', '.editItem', function () {
                var item_id = $(this).data('id');

                $.get("{{ route('admin.transaction.index') }}" +'/' + item_id +'/edit', function (data) {
                    $('#modelHeading').html("Sunting Item");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#item_id').val(data.id);
                    $('#name').val(data.name);
                    $('#fine').val(data.fine);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Mengirim..');

                $.ajax({
                    data: $('#itemForm').serialize(),
                    url: "{{ route('admin.transaction.store') }}",
                    type: "POST",
                    dataType: 'json',

                    success: function (data) {
                        $('#itemForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtn').html('SUBMIT');
                        table.draw();
                        location.reload();

                        $.toast({
                            heading: 'Pemberitahuan',
                            text: 'Item tersimpan!',
                            position: 'top-right',
                            loaderBg: '#ef8243',
                            bgColor: '#212120',
                            textColor: '#bcbcbc',
                            icon: 'success',
                            hideAfter: 2000,
                            stack: false
                        })
                    },

                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deleteItem', function () {
                var item_id = $(this).data("id");
                result = confirm("Apakah buku sudah dikembalikan?");

                if(result){
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ route('admin.transaction.index') }}"+'/'+item_id,

                        success: function (data) {
                            table.draw();                            
                            location.reload();
                            
                            $.toast({
                                heading: 'Pemberitahuan',
                                text: 'Item terhapus!',
                                position: 'top-right',
                                loaderBg: '#ef8243',
                                bgColor: '#212120',
                                textColor: '#bcbcbc',
                                icon: 'success',
                                hideAfter: 2000,
                                stack: false
                            })
                        },

                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                };
            });
        });
    </script>
@endpush