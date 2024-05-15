@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Pendaftaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.index.update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit Pendaftaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                          <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <p>{{ $data->nik  }}</p>
                                @error('nik')
                                <small>{{ $message }}</small>
                                @enderror
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Anak</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="{{ old('nama', $data->nama) }}">
                              @error('nama')
                                  <small>{{ $message }}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Ortu</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="ortu" value="{{ old('ortu', $data->ortu) }}">
                              @error('ortu')
                                  <small>{{ $message }}</small>
                              @enderror
                            <div class="form-group">
                              <label for="exampleInputPassword1">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{ old('alamat', $data->alamat) }}">
                              @error('alamat')
                              <small>{{ $message }}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telp</label>
                                <input type="text" name="no_telp" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{ old('no_telp', $data->no_telp) }}">
                                @error('no_telp')
                                <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tgl lahir</label>
                                <input type="date" name="lahir" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{ old('lahir', $data->lahir) }}">
                                @error('lahir')
                                <small>{{ $message }}</small>
                                @enderror
                              </div>
                          </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card --> 
                    </div>
                    <!--/.col (left) -->
                  </div>
            </form>

          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    
    <!-- /.content -->
  </div>
@endsection