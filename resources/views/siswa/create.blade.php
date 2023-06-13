@extends('siswa.layout')
@section('content')
 
<div class="container py-4">
    <div class="card">
        <div class="card-header">Students Page</div>
        <div class="card-body">
            <form action="{{ url('siswa') }}" method="post">
                {!! csrf_field() !!}
                <label>Nama</label></br>
                <input type="text" name="nama" id="nama" class="form-control"></br>
                <label>Kelas</label></br>
                <input type="text" name="kelas" id="kelas" class="form-control"></br>
                <label>NIS</label></br>
                <input type="text" name="nis" id="nis" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>
</div>
 
@stop