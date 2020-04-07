@extends('layouts.app')

@section('head')
@endsection

@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title pull-left">News</h4>
                                <button class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light" id="addItem">TAMBAH BARU </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data-table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>
                                                    Judul
                                                </th>
                                                <th>
                                                    Deskripsi
                                                </th>
                                                <th>
                                                    Gambar
                                                </th>
                                                <th>
                                                    Tanggal
                                                </th>
                                                <th class="text-center">
                                                    Opsi
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
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="modelHeading"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form id="itemForm" name="itemForm" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="item_id" id="item_id">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="title" class="col-sm-2">Judul</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Judul news" value="" required="">
                                            </div>
                                            <br>
                                            <label for="description" class="col-sm-2">Deskripsi&nbsp;News</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="description" id="description" required="" placeholder="Masukkan deskripsi buku"></textarea>
                                            </div>
                                            <br>
                                            <label for="event_date" class="col-sm-2">Judul</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" id="event_date" name="event_date" value="" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="image" class="col-sm-2">Gambar<a href="#" class="btn btn-danger d-none" id="btnDiscard">Gambar&nbsp;Semula</a></label>
                                            <div class="col-sm-12">
                                                <a href="#" onclick="document.getElementById('image_file').click();"><img src="" id="image" alt="" class="img-thumbnail">
                                                </a><input type="file" class="d-none" id="image_file" name="image_file" value="">
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.news.index") }}',
                columns: [
                    { data: 'id', name: 'id', class: 'text-center' },
                    { data: 'title', name: 'title', },
                    { data: 'description', name: 'description', },
                    { data: 'image', name: 'image', class: 'text-center', 
                        "render": function (data, type, full, meta) {
                        return "<img src=\"" + '{{ asset('media/images/news/') }}' + '/' + data + "\" height=\"50\"/>";
                        }
                    },
                    { data: 'event_date', name: 'event_date', },
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
                $("#image").prop('required',true);
                $('#btnDiscard').addClass('d-none');
                $("#image").attr('src','{{ asset('media/images/news/insert.png') }}');
            });
            
            $('body').on('click', '.editItem', function () {
                $("#image").prop('required',false);
                $('#btnDiscard').addClass('d-none');
                var item_id = $(this).data('id');

                $.get("{{ route('admin.news.index') }}" +'/' + item_id +'/edit', function (data) {
                    $('#modelHeading').html("Sunting Item");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#item_id').val(data.id);
                    $('#title').val(data.title);
                    $('#description').val(data.description);
                    $('#event_date').val(data.event_date);
                    $("#image").attr('src','{{ asset('media/images/news/') }}' + '/' + data.image);
                })
            });
            
            $('#itemForm').on('submit', function(e){
                e.preventDefault();
                $('#saveBtn').html('Mengirim..');
                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.news.store') }}",
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,

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
                        url: "{{ route('admin.news.index') }}"+'/'+item_id,

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

        $(document).ready(function () {

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#image_file').on('change', function () {
                $imgSrc = $('#image').attr('src');
                readURL(this);
                $('#btnDiscard').removeClass('d-none');
            });
            
            $('#btnDiscard').on('click', function () {
                // if ($('#btnDiscard').hasClass('d-none')) {
                $('#btnDiscard').addClass('d-none');
                $('#image').attr('src', $imgSrc);
                $('#image_file').val('');
                // }
            });
        });
    </script>
@endpush