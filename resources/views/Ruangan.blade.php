<!-- Extend ini digunakan untuk memanggil data dari template -->
@extends('template/template')
<!-- Section ini adalah halaman yang akan ditampilkan ke web -->
@section('main-content')
<!-- SideBar -->
<div class="container-fluid">
  <div class="row flex-nowrap" style="width:85%;">
    <div style="background-color: #DDD;" class="col-auto col-md-4 col-lg-2 min-vh-100 d-flex flex-column justify content">
      <div style="background-color: #DDD;" class="">
        <a class="d-flex text-decoration-none align-items-center text-white">
        </a>
        <ul class="nav nav-pills flex-column mt-2">
          <li class="nav-item">
            <a href="{{ url('admin/pasien')}}" class="nav-link text-black" aria-current="page">Pasien</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/ruangan')}}" style="background-color: #0077B6;" class="nav-link active">Ruangan</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/dokter')}}" class="nav-link text-black" aria-current="page">Dokter</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/logout')}}" class="nav-link text-black">Keluar</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="badan">
        @if(Session::has('error'))
        <div class="alert alert-danger alert-block" role="alert" id="alert">
            {{ Session::get('error') }}
        </div>
        @endif

    @if(Session::has('success'))
        <div class="alert alert-success alert-block" role="alert" id="alert">
            {{ Session::get('success') }}
        </div>
    @endif

      <div class="judul">
        <div>
          Ruangan
        </div>
        <a href="{{ url('admin/tambah-ruangan')}}" style="text-decoration: none;">
          <div class="tambah">
            Tambah
          </div>
        </a>
      </div>
      <div>
        <table align="center" class="tTabel">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Ruangan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
            $counter = 0;
            @endphp
            @foreach ($ruangan as $item)
            @php
            $counter += 1;
            @endphp
            <tr>
              <td>{{ $counter}}</td>
              <td>{{ $item->nama_ruangan}}</td>
              <td>{{ $item->status}}</td>
              <td>
                <a class="tEdit" href="{{ url('admin/edit-ruangan/'.$item->id)}}">Edit</a>
                <a class="tHapus" href="{{ url('admin/hapus-ruangan/'.$item->id)}}" onclick="return confirm('anda yakin ingin menghapus?')">Hapus</a>
                <a class="tDetail" href="{{ url('admin/detail-ruangan/'.$item->id)}}">Detail</a>
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

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
  $(function() {
    $('#alert').delay(3000).fadeOut();
    });
</script>

@endsection
