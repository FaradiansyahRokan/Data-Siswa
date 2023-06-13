@extends('siswa.layout')
@section('content')

<header>
  @section('nav')
  
  @endsection
</header>
    <div class="container">
        <div class="row  d-flex justify-content-center py-4">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Siswa Siswa </h2>
                        <form action="{{ route('siswa.index') }}" method="GET">
                          <div class="input-group">
                              <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Cari siswa...">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                              </div>
                          </div>
                      </form> <br>
                      @if ($search)
                        <div class="alert alert-info">
                              Hasil pencarian untuk kata kunci: <strong>{{ $search }}</strong>
                                <a href="{{ route('siswa.index') }}" class="close" data-dismiss="alert">&times;</a>
                        </div>
                      @endif
                        {{-- @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                            @auth
                                <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif --}}
                    </div>
                    {{-- <div class="card-body">
                        <a href="{{ url('/siswa/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Siswa Baru
                        </a> --}}
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                {{-- <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead> --}}
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>
                                          Nama
                                          <a href="{{ route('siswa.index', ['sort' => 'nama', 'order' => 'asc']) }}"><i class="fa fa-sort-alpha-asc ml-2"></i></a>
                                          <a href="{{ route('siswa.index', ['sort' => 'nama', 'order' => 'desc']) }}"><i class="fa fa-sort-alpha-desc ml-2"></i></a>
                                      </th>
                                      <th>
                                          Kelas
                                          <a href="{{ route('siswa.index', ['sort' => 'kelas', 'order' => 'asc']) }}"><i class="fa fa-sort-alpha-asc ml-2"></i></a>
                                          <a href="{{ route('siswa.index', ['sort' => 'kelas', 'order' => 'desc']) }}"><i class="fa fa-sort-alpha-desc ml-2"></i></a>
                                      </th>
                                      <th>
                                          NIS
                                          <a href="{{ route('siswa.index', ['sort' => 'nis', 'order' => 'asc']) }}"><i class="fa fa-sort-numeric-asc ml-2"></i></a>
                                          <a href="{{ route('siswa.index', ['sort' => 'nis', 'order' => 'desc']) }}"><i class="fa fa-sort-numeric-desc ml-2"></i></a>
                                      </th>
                                      <th>Actions</th>
                                  </tr>
                                    {{-- <div class="d-flex justify-content-between">
                                <div class="align-self-center">
                                    {{ $siswa->links() }}
                                </div>
                                <div class="align-self-center">
                                    <form action="{{ route('siswa.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="hidden" name="sort" value="{{ $sort }}">
                                            <input type="hidden" name="order" value="{{ $order }}">
                                            <input type="hidden" name="search" value="{{ $search }}">
                                            <input type="hidden" name="page" value="{{ $siswa->currentPage() - 1 }}">
                                            <button type="submit" class="btn btn-secondary" {{ $siswa->previousPageUrl() ? '' : 'disabled' }}>
                                                <i class="fa fa-chevron-left"></i> Prev
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="align-self-center">
                                    <form action="{{ route('siswa.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="hidden" name="sort" value="{{ $sort }}">
                                            <input type="hidden" name="order" value="{{ $order }}">
                                            <input type="hidden" name="search" value="{{ $search }}">
                                            <input type="hidden" name="page" value="{{ $siswa->currentPage() + 1 }}">
                                            <button type="submit" class="btn btn-secondary ml-2" {{ $siswa->nextPageUrl() ? '' : 'disabled' }}>
                                                Next <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                              </thead>
                                <tbody>
                                @foreach($siswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>
                                            <a href="{{ url('/siswa/' . $item->id) }}" title="View Student"><button class="btn btn-outline-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/siswa/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Hapus
                                              </button>

                                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Apakah Anda yakin ingin menghapus Siswa Ini
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                      <form method="POST" action="{{ url('/siswa' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger" title="Delete Student"><i class="fa fa-trash-o" aria-hidden="true"></i> Ya Hapus!</button>
                                                    </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                              </table>

                                        
                              <div class="d-flex justify-content-between">
                                <div class="align-self-center">
                                  <form action="{{ route('siswa.index') }}" method="GET">
                                      <div class="input-group">
                                          <input type="hidden" name="sort" value="{{ $sort }}">
                                          <input type="hidden" name="order" value="{{ $order }}">
                                          <input type="hidden" name="search" value="{{ $search }}">
                                          <input type="hidden" name="page" value="{{ $siswa->currentPage() - 1 }}">
                                          <button type="submit" class="btn btn-secondary" {{ $siswa->previousPageUrl() ? '' : 'disabled' }}>
                                              <i class="fa fa-chevron-left"></i> Prev
                                          </button>
                                      </div>
                                  </form>
                              </div>
    
                              <div class="align-self-center">
                                <form action="{{ route('siswa.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="hidden" name="sort" value="{{ $sort }}">
                                        <input type="hidden" name="order" value="{{ $order }}">
                                        <input type="hidden" name="search" value="{{ $search }}">
                                        <input type="hidden" name="page" value="{{ $siswa->currentPage() + 1 }}">
                                        <button type="submit" class="btn btn-secondary" {{ $siswa->nextPageUrl() ? '' : 'disabled' }}>
                                            Next <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                          </div>
                            </div>
                          </div>
                </div>
              </div>
            </div>
          </div>
@endsection
{{-- 
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}

