@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Pertumbuhan</li>
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
                    <!-- left column -->
                    <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Detail Pertumbuhan</h3>
                        </div>
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">NIK</label>
                              <p>{{ $data->nik }}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Anak</label>
                                <p>{{ $data->nama }}</p>
                            </div>
                          </div>
                          <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                              <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tinggi Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Lingkar Kepala</th>
                                    <th>Catatan</th>
                                    <th>Tgl posyandu</th>
                                </tr>
                              </thead>
                            <tbody>
                                @foreach ($data->pertumbuhan as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->tb }}</td>
                                        <td>{{ $d->bb }}</td>
                                        <td>{{ $d->lk }}</td>
                                        <td>{{ $d->catatan }}</td>
                                        <td>{{ $d->tglposyandu }}</td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('peserta.index2') }}" class="btn btn-info"><i class="fas fa-backward"></i>Kembali</a>
                      </div>
                      <!-- /.card --> 
                    </div>
                    <!--/.col (left) -->
                  </div>
            </form>

          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

      <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Grafik Berat Badan Bulanan</div>
                        
                        <div class="card-body">
                            <div id="grafik"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                var beratbadan = @json($beratbadanArray);
                var bulan = @json($bulanArray);
        
                Highcharts.chart('grafik', {
                    title: {
                        text: 'Grafik Berat Badan'
                    },
                    xAxis: {
                        categories: bulan,
                        title: {
                            text: 'Bulan'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Berat Badan (kg)'
                        }
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'Berat Badan',
                        data: beratbadan
                    }]
                });
            });
        </script>
      </section>
    
    <!-- /.content -->
  </div>
@endsection