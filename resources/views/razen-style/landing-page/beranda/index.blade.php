@extends('razen-style.layouts.app')
@section('title', 'Razen Style | Landing Page | Beranda')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/font/CS-Interface/style.css') }}">
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2-bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/bootstrap-datepicker3.standalone.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-selection__rendered {
            line-height: 40px !important;
        }
        .select2-container .select2-selection--single {
            height: 41px !important;
        }
        .select2-selection__arrow {
            height: 36px !important;
        }
        .modal-dialog{
            pointer-events: all !important;
        }
    </style>
@endsection

@section('content')
    @php
        use App\Models\LandingPageBeranda;

        $beranda = LandingPageBeranda::first();

        $section_3 = json_decode($beranda->section_3, true);
        $section_5 = json_decode($beranda->section_5, true);
        $section_6 = json_decode($beranda->section_6, true);
    @endphp
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title"> Beranda</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('razen-style.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Landing Page</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('razen-style.landing-page.beranda.index') }}">Beranda</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>

    <!-- Content Start -->
    <h2 class="small-title">Atur</h2>
    <!-- Content End -->

    {{-- Section 1 Start --}}

    <div class="card mb-5">
        <div class="card-body row">
            <div class="col-6 mb-3">
                <h2 class="small-title">Edit Section 1</h2>
            </div>
            <div class="col-6 mb-3" style="text-align: right;">
                <a href="{{ route('beranda') }}#slider-area" class="btn btn-icon waves-effect waves-light btn-secondary" target="blank"><i class="fas fa-pager"></i> Preview</a>
            </div>
            <div class="col-12 mb-3">
                <img src="{{ asset('images/landing-page/beranda/section_1.png') }}" alt="" class="img-fluid rounded">
            </div>
            <div class="col-12 mb-3" style="text-align:right">
                <button class="btn btn-outline-primary waves-effect waves-light mr-2 item_create" type="button" data-bs-toggle="modal" data-bs-target="#addEditModal" title="Tambah Data" id="create"><i class="fas fa-plus"></i></button>
            </div>
            <div class="data-table-rows slim">
                <!-- Table Start -->
                <div class="data-table-responsive-wrapper">
                    <table id="banner_beranda_table" class="data-table w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>

    <div id="addEditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addEditModalLabel">Tambah Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form class="form-horizontal" id="banner_beranda_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 position-relative form-group">
                                    <label for="judul" class="control-label">Judul</label>
                                    <textarea name="judul" id="judul" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 position-relative form-group">
                                    <label for="deskripsi" class="control-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="gambar" class="control-label">Gambar</label>
                            <input type="file" class="dropify" name="gambar" id="gambar" data-height="150" data-allowed-file-extensions="png jpg jpeg webp" data-show-errors="true">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect width-md waves-light" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="aksi" id="aksi" value="Save">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <button type="submit" name="aksi_button" id="aksi_button" class="btn btn-primary waves-effect width-md waves-light">Save</button>
                </div>
            </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detail-title">Detail Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3 position-relative">
                        <hr>
                        <label for="detail_judul" class="control-label">Judul</label>
                        <hr>
                        <p id="detail_judul"></p>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <hr>
                        <label for="detail_deskripsi" class="control-label">Deskripsi</label>
                        <hr>
                        <p id="detail_deskripsi"></p>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <hr>
                        <label for="detail_gambar" class="control-label">Gambar</label>
                        <hr>
                        <img src="" alt="" id="detail_gambar" class="img-fluid">
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center" style="margin: 0;">Apakah anda yakin menghapus?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger waves-effect width-md waves-light">Ok</button>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="button" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 1 End --}}

    {{-- Section 3 Start --}}

    <div class="card mb-5">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <h2 class="small-title">Edit Section 3</h2>
                </div>
                <div class="col-6 mb-3" style="text-align: right;">
                    <a href="{{ route('beranda') }}#product-area" class="btn btn-icon waves-effect waves-light btn-secondary" target="blank"><i class="fas fa-pager"></i> Preview</a>
                </div>
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/beranda/section_3.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('razen-style.landing-page.beranda.store.section-3') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_3?$section_3['judul']:'' }}" required>
                        </div>
                    </div>
                    <div class="col-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary mb-0">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Section 3 End --}}

    {{-- Section 5 Start --}}

    <div class="card mb-5">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <h2 class="small-title">Edit Section 5</h2>
                </div>
                <div class="col-6 mb-3" style="text-align: right;">
                    <a href="{{ route('beranda') }}#purchase-online-area" class="btn btn-icon waves-effect waves-light btn-secondary" target="blank"><i class="fas fa-pager"></i> Preview</a>
                </div>
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/beranda/section_5.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('razen-style.landing-page.beranda.store.section-5') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_5?$section_5['judul']:'' }}" required>
                        </div>
                    </div>
                    <div class="col-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary mb-0">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Section 5 End --}}

    {{-- Section 6 Start --}}

    <div class="card mb-5">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <h2 class="small-title">Edit Section 6</h2>
                </div>
                <div class="col-6 mb-3" style="text-align: right;">
                    <a href="{{ route('beranda') }}#blog-area" class="btn btn-icon waves-effect waves-light btn-secondary" target="blank"><i class="fas fa-pager"></i> Preview</a>
                </div>
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/beranda/section_6.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('razen-style.landing-page.beranda.store.section-6') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_6?$section_6['judul']:'' }}" required>
                        </div>
                    </div>
                    <div class="col-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary mb-0">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Section 6 End --}}
@endsection

@section('js')
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/select2.full.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/tagify.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/singleimageupload.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/cs/dropzone.templates.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/fontawesome.min.js" integrity="sha512-j3gF1rYV2kvAKJ0Jo5CdgLgSYS7QYmBVVUjduXdoeBkc4NFV4aSRTi+Rodkiy9ht7ZYEwF+s09S43Z1Y+ujUkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Section 1 Start

        $(document).ready(function(){
            $('.dropify').dropify();

            var dataTables = $('#banner_beranda_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('razen-style.landing-page.beranda.index') }}"
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'gambar',
                        name: 'gambar'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            });

            CKEDITOR.replace('judul',{
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": 'clipboard',
                        "groups": ['Undo', 'Paste', 'Cut', 'Copy' ]
                    },
                    {
                        "name" : 'editing',
                        "groups" : ['Find', 'Replace', 'SelectAll']
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "blocks"]
                    },
                    {
                        "name": "document",
                        "groups": ["mode"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Source'
            });

            CKEDITOR.replace('deskripsi',{
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": 'clipboard',
                        "groups": ['Undo', 'Paste', 'Cut', 'Copy' ]
                    },
                    {
                        "name" : 'editing',
                        "groups" : ['Find', 'Replace', 'SelectAll']
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "blocks"]
                    },
                    {
                        "name": "document",
                        "groups": ["mode"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Source'
            });

            CKEDITOR.config.allowedContent = true;
        });

        $('#create').click(function(){
            $('#banner_beranda_form')[0].reset();
            CKEDITOR.instances['judul'].setData('');
            CKEDITOR.instances['deskripsi'].setData('');
            $('.dropify-clear').click();
            $('#aksi_button').text('Save');
            $('#aksi_button').prop('disabled', false);
            $('.modal-title').text('Add Data');
            $('#aksi_button').val('Save');
            $('#aksi').val('Save');
            $('#form_result').html('');
        });

        $('#banner_beranda_form').on('submit', function(e){
            e.preventDefault();
            for ( instance in CKEDITOR.instances )
                CKEDITOR.instances[instance].updateElement();
            if($('#aksi').val() == 'Save')
            {
                $.ajax({
                    url: "{{ route('razen-style.landing-page.beranda.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">'+data.errors+'</div>';
                            $('.dropify-clear').click();
                            $('#aksi_button').prop('disabled', false);
                            $('#aksi_button').text('Save');
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">'+data.success+'</div>';
                            $('.dropify-clear').click();
                            $('#aksi_button').prop('disabled', false);
                            $('#banner_beranda_form')[0].reset();
                            CKEDITOR.instances['judul'].setData('');
                            CKEDITOR.instances['deskripsi'].setData('');
                            $('#aksi_button').text('Save');
                            $('#banner_beranda_table').DataTable().ajax.reload();
                        }

                        $('#form_result').html(html);
                    }
                });
            }
            if($('#aksi').val() == 'Edit')
            {
                $.ajax({
                    url: "{{ route('razen-style.landing-page.beranda.update') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">'+data.errors+'</div>';
                            $('#aksi_button').text('Save');
                        }
                        if(data.success)
                        {
                            $('#banner_beranda_form')[0].reset();
                            $('#aksi_button').prop('disabled', false);
                            $('#aksi_button').text('Save');
                            $('#banner_beranda_table').DataTable().ajax.reload();
                            $('#addEditModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil di ubah',
                                showConfirmButton: true
                            });
                        }

                        $('#form_result').html(html);
                    }
                });
            }
        });

        $(document.body).on('click', '.detail', function(){
            var id = $(this).attr('id');
            var url = "{{ route('razen-style.landing-page.beranda.show', ['id' => ":id"]) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                dataType: "json",
                success: function(data)
                {
                    $('#detail-title').text('Detail Data');
                    $('#detail_judul').html(data.result.judul);
                    $('#detail_deskripsi').html(data.result.deskripsi);
                    $('#detail_gambar').attr('src', "{{ asset('images/landing-page/beranda') }}" + '/' + data.result.gambar);
                    $('#detail').modal('show');
                }
            });
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            var url = "{{ route('razen-style.landing-page.beranda.edit', ['id' => ":id"]) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                dataType: "json",
                success: function(data)
                {
                    CKEDITOR.instances['judul'].setData(data.result.judul);
                    CKEDITOR.instances['deskripsi'].setData(data.result.deskripsi);
                    var lokasi_gambar = "{{ asset('images/landing-page/beranda') }}"+'/'+data.result.gambar;
                    var fileDropperGambar = $("#gambar").dropify();

                    fileDropperGambar = fileDropperGambar.data('dropify');
                    fileDropperGambar.resetPreview();
                    fileDropperGambar.clearElement();
                    fileDropperGambar.settings['defaultFile'] = lokasi_gambar;
                    fileDropperGambar.destroy();
                    fileDropperGambar.init();
                    $('#hidden_id').val(id);
                    $('.modal-title').text('Edit Data');
                    $('#aksi_button').text('Edit');
                    $('#aksi_button').prop('disabled', false);
                    $('#aksi_button').val('Edit');
                    $('#aksi').val('Edit');
                    $('#addEditModal').modal('show');
                }
            });
        });

        var user_id;
        $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('.modal-title').text('Konfirmasi');
            $('#ok_button').prop('disabled', false);
            $('#confirmModal').modal('show');
            $('#ok_button').text('Ok');
        });

        $('#ok_button').click(function(){
            var url = "{{ route('razen-style.landing-page.beranda.destroy', ['id' => ":id"]) }}";
            url = url.replace(":id", id);
            $.ajax({
                url: url,
                beforeSend: function(){
                    $('#ok_button').text('Deleting....');
                    $('#ok_button').prop('disabled', true);
                },
                success: function(data)
                {
                    $('#ok_button').prop('disabled', false);
                    $('#confirmModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil di hapus',
                        showConfirmButton: true
                    });
                    $('#banner_beranda_table').DataTable().ajax.reload();
                }
            });
        });

        // Section 1 End
    </script>
@endsection
