@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pertumbuhan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Pertumbuhan Anak</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.index2.update2',['id' => $pertumbuhan->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit Pertumbuhan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                          <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <p>{{ $pertumbuhan->pendaftaran->nik  }}</p>
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Anak</label>
                                 <p>{{ $pertumbuhan->pendaftaran->nama }}</p>
                                </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">TB</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="tb" value="{{ old('tb', $pertumbuhan->tb) }}">
                              @error('tb')
                                  <small>{{ $message }}</small>
                              @enderror
                            <div class="form-group">
                              <label for="exampleInputPassword1">BB</label>
                              <input type="text" name="bb" class="form-control" id="exampleInputPassword1" placeholder="bb" value="{{ old('bb', $pertumbuhan->bb) }}">
                              @error('bb')
                              <small>{{ $message }}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">LK</label>
                                <input type="text" name="lk" class="form-control" id="exampleInputPassword1" placeholder="lk" value="{{ old('lk', $pertumbuhan->lk) }}">
                                @error('lk')
                                <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Catatan</label>
                                <input type="text" name="catatan" class="form-control" id="exampleInputPassword1" placeholder="Catatan" value="{{ old('catatan', $pertumbuhan->catatan) }}">
                                @error('catatan')
                                <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tgl Posyandu</label>
                                <input type="date" name="tglposyandu" class="form-control" id="exampleInputPassword1" placeholder="tgl posyandu" value="{{ old('tglposyandu', $pertumbuhan->tglposyandu) }}">
                                @error('tglposyandu')
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