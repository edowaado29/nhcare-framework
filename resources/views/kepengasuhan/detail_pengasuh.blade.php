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
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kepengasuhan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Detail Pengasuh</h6>
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
    <div class="card">
      <div style="margin-left: 5vh;" class="py-3">
        <a href="{{ route('pengasuh')}}">
          <img src="{{asset ('assets/img/back-button.png') }}" style="width: 5vh; opacity: 50%;">
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="row">
        <div class="col-lg-3 col-sm-12 px-5 pb-3">
          <img src="{{ $peng->foto_pengasuh !== null ? asset('/storage/pengasuhs/foto/' . $peng->foto_pengasuh) : asset('/assets/img/no_image.png') }}" style="width: 100%; border: 2px solid #d4d4d4; border-radius: 10px;">
        </div>
        <div class="col-lg-9 col-sm-12">
          <div style="margin-top: 5vh;">
            <h2 style="font-size: 1.25rem; font-weight: 400; color: grey;">{{$peng->id}}</h2>
            <h3 style="font-size: 2.25rem;">{{$peng->nama_pengasuh}}</h3>
            <h4 style="color: #73A578; font-weight: 400;">{{$peng->email}}</h4>
          </div>
        </div>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="row mt-3 pb-3">
        <div class="col-4" style="padding-left: 60px;">
          <h5 style="font-weight: 500; font-size: 1.15rem;">NBM</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Jenis Kelamin</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Tempat / Tanggal Lahir</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Alamat</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Nomor Handphone</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Pendidikan Terakhir</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Jabatan</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Tanggal Masuk</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">Status</h5>
        </div>
        <div class="col-1">
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">:</h5>
        </div>
        <div class="col-7">
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->nbm}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->jenis_kelamin}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->tempat_lahir}} / {{$peng->tanggal_lahir}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->alamat}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->nomor_handphone}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->pendidikan_terakhir}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->jabatan->nama_jabatan}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->tanggal_masuk}}</h5>
          <h5 style="font-weight: 500; font-size: 1.15rem;">{{$peng->status_pengasuh}}</h5>
        </div>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="row pb-5">
        <div class="col-lg-6 col-sm-12" style="padding-left: 60px;">
          <h5 style="font-weight: 500; font-size: 1.15rem;">Pratinjau Foto KK</h5>
          <img src="{{ $peng->foto_kartukeluarga !== null ? asset('/storage/pengasuhs/KK/' . $peng->foto_kartukeluarga) : asset('/assets/img/no_image.png') }}" style="width: 100%; height: 330px; border: 2px solid #d4d4d4; border-radius: 10px;">
        </div>
        <div class="col-lg-6 col-sm-12" style="padding-right: 60px;">
          <h5 style="font-weight: 500; font-size: 1.15rem;">Pratinjau Foto KTP</h5>
          <img src="{{ $peng->foto_ktp !== null ? asset('/storage/pengasuhs/KTP/' . $peng->foto_ktp) : asset('/assets/img/no_image.png') }}" style="width: 100%; height: 330px; border: 2px solid #d4d4d4; border-radius: 10px;">
        </div>
      </div>
    </div>
  </div>
</main>
@endsection