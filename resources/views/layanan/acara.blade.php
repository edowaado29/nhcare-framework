@extends('layouts.template')

@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agenda</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Acara</h6>
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
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>DATA ACARA</h6>
            </div>
            <div class="container mt-3">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <a href="{{ route('tambah_acara') }}" class="btn btn-sm bg-gradient-primary">Tambah Data</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <input class="form-control" id="search" type="text" placeholder="Masukkan kata kunci ...">
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-success text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-success text-xxs font-weight-bolder opacity-7 ps-2">Nama Acara</th>
                      <th class="text-uppercase text-success text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Acara</th>
                      <th class="text-uppercase text-success text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($acra as $acara)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        {{ $acara->namaAcara }}
                      </td>
                      <td>
                        {{ $acara->tanggalAcara }}
                      </td>
                      <td class="align-middle text-sm">
                        <form action="{{ route('hapus_acara', $acara->id) }}" method="POST" id="delete-form">
                          <a href="" class="btn btn-sm bg-gradient-primary">Detail</a>
                          <a href="{{ route('edit_acara', $acara->id)}}" class="btn btn-sm bg-gradient-success">Edit</a>
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete()">HAPUS</button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3" class="text-center">Data Acara belum Tersedia.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/search.js') }}"></script>
<script>
  function confirmDelete() {
    Swal.fire({
      title: "Apakah Anda Yakin?",
      text: "Ingin Menghapus Data Ini",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak"
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById("delete-form").submit(); // Submit the form if confirmed
      }
    });
  }
</script>

@if (session('message'))
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-right',
    iconColor: 'white',
    customClass: {
      popup: 'colored-toast',
    },
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
  })
  Toast.fire({
    icon: 'success',
    title: "{{ session('message') }}"
  });
</script>
@endif
@endsection