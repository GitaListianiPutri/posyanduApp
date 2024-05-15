@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pertumbuhan Anak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pertumbuhan Anak</li>
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
              <a href="{{ route('admin.index2.create2') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Pertumbuhan Anak</a>
              @endif 
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pertumbuhan</h3>
  
                  <div class="card-tools">
                    <form action="{{ route('admin.index2') }}" method="GET">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        {{-- <th>ID Pertumbuhan</th> --}}
                        {{-- <th>ID Pendaftaran</th> --}}
                        <th>NIK</th>
                        <th>Nama Anak</th>
                        <th>Tingi Badan</th>
                        <th>Berat Badan</th>
                        <th>Lingkar Kepala</th>
                        <th>Catatan</th>
                        <th>Tgl Posyandu</th>
                        @if (Auth::user()->hasRole('admin'))
                        <th>Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $pendaftaran)
                        @foreach ($pendaftaran->pertumbuhan as $pertumbuhan)
                        <tr>
                          {{-- <td>{{ $pertumbuhan->id }}</td> --}}
                            {{-- <td>{{ $pendaftaran->id }}</td> --}}
                            <td>{{ $pendaftaran->nik }}</td>
                            <td>{{ $pendaftaran->nama }}</td>
                            <td>{{ $pertumbuhan->tb }}</td>
                            <td>{{ $pertumbuhan->bb }}</td>
                            <td>{{ $pertumbuhan->lk }}</td>
                            <td>{{ $pertumbuhan->catatan }}</td>
                            <td>{{ $pertumbuhan->tglposyandu }}</td>
                            @if (Auth::user()->hasRole('admin'))
                            <td>
                                <a href="{{ route('admin.index2.edit2',['id' => $pertumbuhan->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $pertumbuhan->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                            @endif
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-hapus{{ $pertumbuhan->id }}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Apakah yakin ingin menghapus data <b>{{ $pendaftaran->nama }}</b>?</p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                  <form action="{{ route('admin.index2.delete2',['id' => $pertumbuhan->id]) }}" method="POST">
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
                        @endforeach
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
