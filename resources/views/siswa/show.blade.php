<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('content')
<div class="container py-4">
<div class="card">
        <div class="card-header">Halaman Siswa</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Nama : {{ $siswa->nama }}</h5>
                <p class="card-text">Kelas : {{ $siswa->kelas }}</p>
                <p class="card-text">NIS : {{ $siswa->nis }}</p>
            </div>
        </hr>
        <a href="{{ url('/siswa')}}"><input type="button" class="btn btn-outline-success m-1" value="Kembali" ></a>
    </div>
</div>
</div>