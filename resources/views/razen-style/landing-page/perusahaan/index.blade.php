@extends('razen-style.layouts.app')
@section('title', 'Razen Style | Landing Page | Perusahaan')

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
        use App\Models\LandingPagePerusahaan;

        $perusahaan = LandingPagePerusahaan::first();

        $section_1 = json_decode($perusahaan->section_1, true);
        $section_2 = json_decode($perusahaan->section_2, true);
        $section_3 = json_decode($perusahaan->section_3, true);
    @endphp
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Perusahaan</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('razen-style.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Landing Page</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('razen-style.landing-page.perusahaan.index') }}">Perusahaan</a></li>
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
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <h2 class="small-title">Edit Section 1</h2>
                </div>
                <div class="col-6 mb-3" style="text-align: right;">
                    <a href="{{ route('perusahaan') }}#heading-banner-area" class="btn btn-icon waves-effect waves-light btn-secondary" target="blank"><i class="fas fa-pager"></i> Preview</a>
                </div>
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_1.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            {{-- Form Start --}}
            <form action="{{ route('razen-style.landing-page.perusahaan.store.section-1') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="position-relative form-group">
                            <label for="" class="form-label">Gambar</label>
                            @if ($section_1)
                            <input type="file" class="dropify" name="gambar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{ asset('images/landing-page/perusahaan/'.$section_1['gambar']) }}" data-show-errors="true" required>
                            @else
                            <input type="file" class="dropify" name="gambar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" required>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
            {{-- Form End --}}
        </div>
    </div>

    {{-- Section 1 End --}}

    {{-- Section 2 Start --}}

    <div class="card mb-5">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <h2 class="small-title">Edit Section 2</h2>
                </div>
                <div class="col-6 mb-3" style="text-align: right;">
                    <a href="{{ route('perusahaan') }}#about-us-area" class="btn btn-icon waves-effect waves-light btn-secondary" target="blank"><i class="fas fa-pager"></i> Preview</a>
                </div>
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_2.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            {{-- Form Start --}}
            <form action="{{ route('razen-style.landing-page.perusahaan.store.section-2') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_2?$section_2['judul'] : ''}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="5" class="form-control" id="dekripsi_section_2" required>{{ $section_2?$section_2['deskripsi'] : '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="position-relative form-group mb-3">
                            <label for="" class="form-label">Gambar</label>
                            @if ($section_2)
                                <input type="file" class="dropify" name="gambar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-default-file="{{ asset('images/landing-page/perusahaan/'.$section_2['gambar']) }}" required>
                            @else
                                <input type="file" class="dropify" name="gambar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" required>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
            {{-- Form End --}}
        </div>
    </div>

    {{-- Section 2 End --}}

    {{-- Section 3 Start --}}

    <div class="card mb-5">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <h2 class="small-title">Edit Section 3</h2>
                </div>
                <div class="col-6 mb-3" style="text-align: right;">
                    <a href="{{ route('perusahaan') }}#team-member-area" class="btn btn-icon waves-effect waves-light btn-secondary" target="blank"><i class="fas fa-pager"></i> Preview</a>
                </div>
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_3.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            {{-- Form Start --}}
            <form action="{{ route('razen-style.landing-page.perusahaan.store.section-3') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
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
            {{-- Form End --}}
        </div>
    </div>

    {{-- Section 3 End --}}
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
        $(document).ready(function(){
            $('.dropify').dropify();
            $('.dropify-wrapper').css('line-height', '3rem');

            CKEDITOR.replace('dekripsi_section_2',{
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
    </script>
@endsection
