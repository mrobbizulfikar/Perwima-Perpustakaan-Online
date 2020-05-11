@extends('layouts.app')

@section('head')
@endsection

@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title pull-left">Kategori Buku</h4>
                                <button class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light" id="addItem">TAMBAH BARU </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="data-table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>
                                                    Kategori
                                                </th>
                                                <th class="text-center">
                                                    Tindakan
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
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
                                    <label for="jenis" class="col-sm-2">Nama&nbsp;Kategori</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Kategori" value="" required="">
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.category.index") }}',
                columns: [
                    { data: 'id', name: 'id', class: 'text-center' },
                    { data: 'name', name: 'name', },
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

                $.get("{{ route('admin.category.index') }}" +'/' + item_id +'/edit', function (data) {
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
                    url: "{{ route('admin.category.store') }}",
                    type: "POST",
                    dataType: 'json',

                    success: function (data) {
                        $('#itemForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtn').html('SUBMIT');
                        table.draw();

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
                result = confirm("Apakah anda yakin ingin menghapus item ini?");

                if(result){
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ route('admin.category.index') }}"+'/'+item_id,

                        success: function (data) {
                            table.draw();
                            
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