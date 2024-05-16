@extends('layouts.template')

@section('content')
<main class="main-content position-relative border-radius-lg ">
<style>
        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
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
        <h6 class="font-weight-bolder text-white mb-0">Tambah Kedonaturan</h6>
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
      <div class="col-12">
        <div class="row">
          <div class="col-lg-7 col-md-7 col-sm-12 mt-3">
            <div class="card" style="height: 100%">
              <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="name" class="form-label text-secondary fs-6">Nama <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label text-secondary fs-6">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label text-secondary fs-6">Password <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="password">
                </div>
                <div class="mb-3">
                  <label for="no_hp" class="form-label text-secondary fs-6">Nomor Handphone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="no_hp">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label text-secondary fs-6">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label text-secondary fs-6">Jenis Kelamin <span class="text-danger">*</span></label><br>
                    <input type="radio" id="laki-laki" name="jenis_kelamin">
                    <label for="laki-laki" class="text-secondary" style="font-weight: 500; font-size: 1rem;">Laki-laki</label>
                    <input type="radio" id="perempuan" name="jenis_kelamin" style="margin-left: 3vh;">
                    <label for="perempuan" class="text-secondary" style="font-weight: 500; font-size: 1rem;">Perempuan</label>
                </div>
                <div class="row mt-4">
                  <div class="col-6">
                    <a href="/kedonaturan" class="btn btn-sm bg-gradient-danger w-100">Kembali</a>
                  </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-sm bg-gradient-success w-100">Tambah</button>
                  </div>
                </div>
              </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 mt-3">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection