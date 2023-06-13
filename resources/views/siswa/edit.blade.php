@extends('siswa.layout')
@section('content')

<div class="container py-4">
    <div class="card">
        <div class="card-header">Edit Siswa</div>
            <div class="card-body">
                <form action="{{ url('siswa/' .$siswa->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$siswa->id}}" id="id" />
                <label>Nama</label></br>
                <input type="text" name="nama" id="nama" value="{{$siswa->nama}}" class="form-control"></br>
                <label>Kelas</label></br>
                <input type="text" name="kelas" id="kelas" value="{{$siswa->kelas}}" class="form-control"></br>
                <label>NIS</label></br>
                <input type="text" name="nis" id="nis" value="{{$siswa->nis}}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
            
        </div>
    </div>
</div>
@stop