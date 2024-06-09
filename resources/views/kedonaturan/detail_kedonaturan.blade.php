@extends('layouts.template')

@section('content')
<main class="main-content position-relative border-radius-lg ">
  <style>
    .colored-toast.swal2-icon-success {
      background-color: #a5dc86 !important;
    }
  </style>
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kedonaturan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Detail Kedonaturan</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a href="/profile" class="nav-link text-white font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-8">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>DETAIL KEDONATURAN</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2 mt-3">
              <div class="row px-4">
                    <div class="col-lg-4 col-sm-12">
                    <img src="{{ $donatur->foto_donatur !== null ? asset('/storage/kedonaturans/' . $donatur->foto_donatur) : asset('/assets/img/no_image.png') }}" class="mb-3" id="imagePreview" style="width: 100%; height: 230px; border: 2px solid #a5dc86; border-radius: 10px;">
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <h2 class="mt-3">{{$donatur->nama_donatur}}</h2>
                        <p>{{$donatur->jenis_kelamin}}</p>
                        <p style="border: 2px solid #d4d4d4; border-radius: 5px; padding: 15px;">{{$donatur->alamat}}</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection