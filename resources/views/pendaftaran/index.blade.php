@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pendaftaran Posyandu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pendaftaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              @if (Auth::user()->hasRole('admin'))
              <a href="{{ route('admin.index.create') }}" class="btn btn-primary"><i ></i>Pendaftaran</a>             
              @endif
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pendaftaran</h3>
  
                  <div class="card-tools">
                    <form action="{{ route('admin.index') }}" method="GET">
                      <div class="input-group input-group-sm" style="width: 150px;">
                    </form>
                      <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request->get('search') }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        {{-- <th>No</th> --}}
                        <th>No Pendaftaran</th>
                        <th>NIK</th>
                        <th>Nama Anak</th>
                        <th>Nama Ortu</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            {{-- membuat nomor otomatis dari laravel --}}
                             {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->nik }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->ortu }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td>{{ $d->no_telp }}</td>
                            <td>{{ $d->lahir }}</td>
                            <td>
                              @if (!Auth::user()->hasRole('admin'))
                                <a href="{{ route('peserta.index.detail',['id' => $d->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i>Detail</a>
                              @endif
                              @if (Auth::user()->hasRole('admin'))  
                                <a href="{{ route('admin.index.edit',['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                      </tr> 
                      {{-- modal --}}
                       <div class="modal fade" id="modal-hapus{{ $d->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Apakah yakin ingin menghapus data <b>{{ $d->nama }}</b> </p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <form action="{{ route('admin.index.delete',['id' => $d->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                </form>
                            </div> 
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->                              
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection