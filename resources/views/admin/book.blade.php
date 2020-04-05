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
                                                    ISBN
                                                </th>
                                                <th>
                                                    Kategori
                                                </th>
                                                <th>
                                                    Deskripsi
                                                </th>
                                                <th>
                                                    Gambar
                                                </th>
                                                <th>
                                                    Pengarang
                                                </th>
                                                <th>
                                                    Penerbit
                                                </th>
                                                <th>
                                                    Tahun
                                                </th>
                                                <th>
                                                    Halaman
                                                </th>
                                                <th>
                                                    Status
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
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Judul buku" value="" required="">
                                            </div>
                                            <br>
                                            <label for="isbn" class="col-sm-2">Nomor&nbsp;ISBN</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Nomor ISBN" value="" required="">
                                            </div>
                                            <br>
                                            <label for="category_id" class="col-sm-2">Pilih&nbsp;Kategori</label>
                                            <div class="col-sm-12">
                                                <select class="form-control py-0" id="category_id" name="category_id">
                                                    <option value="" selected disabled>Daftar Kategori</option>
                                                    @foreach($category as $fc)
                                                        <option value="{{ $fc->id }}">{{ $fc->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <label for="description" class="col-sm-2">Deskripsi&nbsp;Buku</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="description" id="description" required="" placeholder="Masukkan deskripsi buku"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="author" class="col-sm-2">Pengarang</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="author" name="author" placeholder="Nama pengarang" value="" required="">
                                            </div>
                                            <br>
                                            <label for="publisher" class="col-sm-2">Penerbit</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Nama penerbit" value="" required="">
                                            </div>
                                            <br>
                                            <label for="year" class="col-sm-2">Tahun&nbsp;Terbit</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="year" name="year" placeholder="-" value="" required="">
                                            </div>
                                            <br>
                                            <label for="page" class="col-sm-2">Halaman</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="page" name="page" placeholder="-" value="" required="">
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
                ajax: '{{ route("admin.book.index") }}',
                columns: [
                    { data: 'id', name: 'id', class: 'text-center' },
                    { data: 'title', name: 'title' },
                    { data: 'isbn', name: 'isbn' },
                    { data: 'category.name', name: 'category_id' },
                    { data: 'description', name: 'description' },
                    { data: 'image', name: 'image', class: 'text-center', 
                        "render": function (data, type, full, meta) {
                        return "<img src=\"" + '{{ asset('media/images/book/') }}' + '/' + data + "\" height=\"50\"/>";
                        }
                    },
                    { data: 'author', name: 'author' },
                    { data: 'publisher', name: 'publisher' },
                    { data: 'year', name: 'year', class: 'text-center' },
                    { data: 'page', name: 'page', class: 'text-right' },
                    { data: 'status', name: 'status', class: 'text-center',  
                        render: function ( data, type, row ) {
                            if(data == 1){
                                return 'Tersedia';
                            }else{
                                return 'Dipinjam';
                            }
                        }
                    },
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
                $("#image").attr('src','{{ asset('media/images/book/default.png') }}');
            });
            
            $('body').on('click', '.editItem', function () {
                $("#image").prop('required',false);
                $('#btnDiscard').addClass('d-none');
                var item_id = $(this).data('id');

                $.get("{{ route('admin.book.index') }}" +'/' + item_id +'/edit', function (data) {
                    $('#modelHeading').html("Sunting Item");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#item_id').val(data.id);
                    $('#title').val(data.title);
                    $('#isbn').val(data.isbn);
                    $('#category_id').val(data.category_id);
                    $('#description').val(data.description);
                    $('#author').val(data.author);
                    $('#publisher').val(data.publisher);
                    $('#year').val(data.year);
                    $('#page').val(data.page);
                    $("#image").attr('src','{{ asset('media/images/book/') }}' + '/' + data.image);
                })
            });
            
            $('#itemForm').on('submit', function(e){
                e.preventDefault();
                $('#saveBtn').html('Mengirim..');
                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.book.store') }}",
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
                        url: "{{ route('admin.book.index') }}"+'/'+item_id,

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