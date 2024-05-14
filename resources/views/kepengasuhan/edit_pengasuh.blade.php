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
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kepengasuhan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Edit Pengasuh</h6>
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
                  <form action="" method="post">
                    <div class="mb-3">
                      <label for="nik" class="form-label text-secondary fs-6">NIK <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="nik">
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label text-secondary fs-6">Nama <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-secondary fs-6">Jenis Kelamin <span class="text-danger">*</span></label><br>
                        <input type="radio" id="laki-laki" name="jenis_kelamin">
                        <label for="laki-laki" class="text-secondary" style="font-weight: 500; font-size: 1rem;">Laki-laki</label>
                        <input type="radio" id="perempuan" name="jenis_kelamin" style="margin-left: 3vh;">
                        <label for="perempuan" class="text-secondary" style="font-weight: 500; font-size: 1rem;">Perempuan</label>
                    </div>
                    <div class="mb-3">
                        <label for="tpt_lahir" class="form-label text-secondary fs-6">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tpt_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label text-secondary fs-6">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tgl_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="last_pend" class="form-label text-secondary fs-6">Pendidikan Terakhir</label>
                        <select class="form-control" id="last_pend">
                            <option value="SD">SD</option>
                            <option value="SMP">SMP/Sederajat</option>
                            <option value="SMA">SMA/Sederajat</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label text-secondary fs-6">Jabatan</label>
                        <select class="form-control" id="jabatan">
                            <option value="Ketua">Ketua</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-secondary fs-6">Status Kepengasuhan <span class="text-danger">*</span></label><br>
                        <input type="radio" name="status_kepengasuhan" id="tetap">
                        <label for="tetap" class="text-secondary" style="font-weight: 500; font-size: 1rem;">Pengasuh Tetap</label>
                        <input type="radio" name="status_kepengasuhan" id="non_tetap" style="margin-left: 3vh;">
                        <label for="non_tetap" class="text-secondary" style="font-weight: 500; font-size: 1rem;">Pengasuh Tidak Tetap</label>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label text-secondary fs-6">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label text-secondary fs-6">Nomor Handphone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary fs-6">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_masuk" class="form-label text-secondary fs-6">Tanggal Masuk <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tgl_masuk">
                    </div>
                    <div class="form-group">
                        <label for="kk_img" class="text-secondary fs-6">Foto Kartu Keluarga (KK) <span class="text-danger">*</span></label><br>
                        <input type="file" class="form-control" id="kk_img" onchange="kkPreview(event)">
                    </div>
                    <div class="form-group">
                        <label for="ktp_img" class="text-secondary fs-6">Foto Kartu Tanda Penduduk (KTP) <span class="text-danger">*</span></label><br>
                        <input type="file" class="form-control" id="ktp_img" onchange="ktpPreview(event)">
                    </div>
                    <div class="form-group">
                      <label for="profile_img" class="text-secondary fs-6">Foto Pengasuh <span class="text-danger">*</span></label><br>
                      <input type="file" class="form-control" id="profile_img" onchange="pengasuhPreview(event)">
                    </div>
                    <div class="row mt-4">
                      <div class="col-6">
                        <a href="/pengasuh" class="btn btn-sm bg-gradient-danger w-100">Kembali</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-sm bg-gradient-success w-100">Edit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 mt-3">
            <div class="card">
              <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">
                  <div class="mb-3">
                    <div class="preview">
                      <label class="text-secondary fs-6">Pratinjau Foto Kartu Keluarga (KK)</label><br>
                      <img src="{{asset('assets/img/no_image.png')}}" class="mb-3" id="kkPreview" style="width: 100%; height: 270px; border: 2px solid #d4d4d4; border-radius: 10px;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-4">
              <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">
                  <div class="mb-3">
                    <div class="preview">
                      <label class="text-secondary fs-6">Pratinjau Foto Kartu Tanda Penduduk (KTP)</label><br>
                      <img src="{{asset('assets/img/no_image.png')}}" class="mb-3" id="ktpPreview" style="width: 100%; height: 270px; border: 2px solid #d4d4d4; border-radius: 10px;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-4">
              <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">
                  <div class="mb-3">
                    <div class="preview">
                      <label class="text-secondary fs-6">Pratinjau Foto Pengasuh</label><br>
                      <img src="{{asset('assets/img/no_image.png')}}" class="mb-3" id="pengasuhPreview" style="width: 100%; height: 400px; border: 2px solid #d4d4d4; border-radius: 10px;">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function kkPreview(event) {
    const reader = new FileReader();
    const image = document.getElementById('kkPreview');
    image.style.maxWidth = '100%';
    image.style.maxHeight = '270px';
    image.style.display = 'none';

    reader.onload = function() {
        if (reader.readyState === FileReader.DONE) {
            image.src = reader.result;
            image.style.display = 'block';
        }
    }

    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
  }

  function ktpPreview(event) {
    const reader = new FileReader();
    const image = document.getElementById('ktpPreview');
    image.style.maxWidth = '100%';
    image.style.maxHeight = '270px';
    image.style.display = 'none';

    reader.onload = function() {
        if (reader.readyState === FileReader.DONE) {
            image.src = reader.result;
            image.style.display = 'block';
        }
    }

    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
  }

  function pengasuhPreview(event) {
    const reader = new FileReader();
    const image = document.getElementById('pengasuhPreview');
    image.style.maxWidth = '100%';
    image.style.maxHeight = '400px';
    image.style.display = 'none';

    reader.onload = function() {
        if (reader.readyState === FileReader.DONE) {
            image.src = reader.result;
            image.style.display = 'block';
        }
    }

    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
  }
</script>

<script>
  // Check if ErrorImage, ErrorJudul, or ErrorDeskripsi variable exists and display toast message if any of them does
  if (typeof ErrorNama !== 'undefined' || typeof ErrorDeskripsi !== 'undefined' || typeof ErrorGambar !== 'undefined') {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-right',
      iconColor: 'white',
      customClass: {
        popup: 'colored-toast swal2-icon-error',
      },
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
    })
    Toast.fire({
      icon: 'warning',
      title: "Form Tidak Boleh Kosong",
    });
  }
</script>
@endsection