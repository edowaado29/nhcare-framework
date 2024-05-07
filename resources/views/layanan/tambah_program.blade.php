@extends('layouts.template')

@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Layanan</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tambah Program</h6>
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
                                <form>
                                    <div class="mb-3">
                                        <label for="program_name" class="form-label text-secondary fs-6">Nama Program <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="program_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="program_desc" class="form-label text-secondary fs-6">Deskripsi Program <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="program_desc">
                                    </div>
                                    <div class="form-group">
                                        <label for="program_img" class="text-secondary fs-6">Gambar Program <span class="text-danger">*</span></label><br>
                                        <input type="file" class="form-control-file" id="program_img">
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <a href="/program" class="btn btn-sm bg-gradient-danger w-100">Kembali</a>
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
                    <div class="card" style="height: 100%">
                        <div class="card-body px-0 pt-0 pb-2 mt-3">
                            <div class="container">
                                <div class="mb-3">
                                    <div class="preview">
                                        <label class="text-secondary fs-6">Pratinjau Gambar Program</label><br>
                                        <img src="" class="mb-3" id="imagePreview" style="width: 100%; height: 270px; border: 2px solid #d4d4d4; border-radius: 10px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main>
@endsection