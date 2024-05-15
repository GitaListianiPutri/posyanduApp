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
                        <li class="breadcrumb-item active">Tambah Data Pertumbuhan Anak</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.index2.store2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Pertumbuhan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pendaftaran_id">ID Pendaftaran</label>
                                    <input type="text" class="form-control" id="pendaftaran_id" name="pendaftaran_id" placeholder="Masukkan ID Pendaftaran" value="{{ old('pendaftaran_id') }}">
                                    @error('pendaftaran_id')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Anak</label>
                                    <p>{{ $pendaftaran->nama }}</p>
                                    @error('nama')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TB </label>
                                    <input type="number" name="tb" class="form-control" id="exampleInputEmail1" placeholder="Masukkan tb anak" value="{{ old('tb') }}">
                                    @error('tb')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">BB</label>
                                    <input type="number" name="bb" class="form-control" id="exampleInputPassword1" placeholder="Masukkan bb anak" value="{{ old('bb') }}">
                                    @error('bb')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">LK</label>
                                    <input type="number" name="lk" class="form-control" id="exampleInputPassword1" placeholder="Masukkan lk anak" value="{{ old('lk') }}">
                                    @error('lk')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Catatan</label>
                                    <input type="text" name="catatan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan catatan" value="{{ old('catatan') }}">
                                    @error('catatan')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tgl Posyandu</label>
                                    <input type="date" name="tglposyandu" class="form-control" id="exampleInputPassword1" placeholder="Masukkan tgl posyandu" value="{{ old('tglposyandu') }}">
                                    @error('tglposyandu')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        
                        <!-- /.card --> 
                    </div>
                    <!--/.col (left) -->
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
