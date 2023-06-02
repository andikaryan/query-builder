<!-- Extend ini digunakan untuk memanggil data dari template -->
@extends('template/template')
<!-- Section ini adalah halaman yang akan ditampilkan ke web -->
@section('main-content')
<!-- SideBar -->
<div class="container-fluid">
@if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
      <div class="row flex-nowrap" style="width:85%;">
        <div style="background-color: #DDD;" class="col-auto col-md-4 col-lg-2 min-vh-100 d-flex flex-column justify content">
          <div style="background-color: #DDD;" class="">
            <a class="d-flex text-decoration-none align-items-center text-white">
            </a>
            <ul class="nav nav-pills flex-column mt-2">
              <li class="nav-item">
                <a href="{{ url('/pasien')}}" style="background-color: #0077B6;" class="nav-link active" aria-current="page">Pasien</a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/obat')}}" class="nav-link text-black">Obat</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="badan">
            <div class="judul">
                <div>
                    Pasien
                </div>
                <a href="{{ url('/tambah-pasien')}}" style="text-decoration: none;">
                    <div class="tambah">
                        Tambah
                    </div>
                </a>
            </div>
            <div>
                <table align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Ruangan</th>
                            <th>Penyakit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                          $counter = 0;
                        @endphp
                        @foreach ($pasien as $item)
                        @php
                          $counter += 1;
                        @endphp
                        <tr>
                            <td>{{ $counter}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->ruangan}}</td>
                            <td>{{ $item->penyakit}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ url('/edit-pasien/'.$item->id)}}" >Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ url('/hapus-pasien/'.$item->id)}}" onclick="return confirm('anda yakin ingin menghapus?')">Hapus</a>
                        
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
  </div>

</body>
</html>

@endsection
