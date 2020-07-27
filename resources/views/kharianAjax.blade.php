{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Admin.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/bootstrap/dashboard.css') }}" rel="stylesheet">





    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css" rel="stylesheet">

    {{-- tanggal --}}







</head>

<style>
    .table.dataTable {
        font-size: 14px;
    }

    a.ex1 {
        margin: 5px 0px 20px 0px;
    }

    a.ex2 {
        font-size: 12px;
    }

    h4.putih {
        color: white;
        font-size: 18px;

    }
</style>

<script>

</script>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">LKP Bobotsari</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <h4 class="putih">Pengeluaran</h4>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                    {{ __('Keluar') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/home') }}">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('tambah') }}">
                                <span data-feather="edit-3"></span>
                                Pemasukan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('ktambah') }}">
                                <span data-feather="shopping-cart"></span>
                                Pengeluaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('laporan') }}">
                                <span data-feather="bar-chart-2"></span>
                                Laporan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

                <a class="btn btn-success ex1" href="javascript:void(0)" id="createNewKharian">Tambah Input Pengeluaran
                    (+)</a>



                <table class="table table-bordered data-table" id="kharians">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Tanggal</th>
                            <th>Kode Rekening</th>
                            <th>Nama Pegawai</th>
                            <th>Uraian</th>
                            <th>Jumlah Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>

        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="kharianForm" name="kharianForm" class="form-horizontal">
                            <input type="hidden" name="kharian_id" id="kharian_id">


                            <div class="form-group">
                                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-12">
                                    <input placeholder="Date" type="text" onfocus="(this.type='date')"
                                        class="form-control " id="tanggal" name="tanggal" value="" required=""></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Kode Rekening</label>
                                <div class="col-sm-12">
                                    <textarea id="koderekening" name="koderekening" required=""
                                        placeholder="Masukan Kode Rekening" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Nama Pegawai</label>
                                <div class="col-sm-12">
                                    <textarea id="namapegawai" name="namapegawai" required=""
                                        placeholder="Masukan Nama Pegawai" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Uraian</label>
                                <div class="col-sm-12">
                                    <textarea id="uraian" name="uraian" required="" placeholder="Masukan uraian"
                                        class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Jumlah anggaran</label>
                                <div class="col-sm-12">
                                    <textarea id="jumlahanggaran" name="jumlahanggaran" required=""
                                        placeholder="Keterangan Jumlah anggaran" class="form-control"></textarea>
                                </div>
                            </div>


                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan
                                    Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        </main>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{-- <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous">
    </script> --}}

    <script>
        window.jQuery || document.write('<script src="{{ asset('js/bootstrap/jquery-slim.min.js') }}"><\/script>')
    </script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Icons -->
    <script src="{{ asset('js/feather-icons/feather.min.js') }}"></script>
    <script>
        feather.replace()
    </script>

    <!-- Graphs -->
    <script src="{{ asset('js/Chart.min.js') }}"> </script>

    <script src="{{ asset('js/bootstrap/bootstrap-datepicker.js') }}"> </script>
    {{-- <script>
        var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script> --}}

    <script type="text/javascript">
        $(function () {
         
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ajaxkharians.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'id', name: 'id'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'koderekening', name: 'koderekening'},
                {data: 'namapegawai', name: 'namapegawai'},
                {data: 'uraian', name: 'uraian'},
                {data: 'jumlahanggaran', name: 'jumlahanggaran'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
         
        $('#createNewKharian').click(function () {
            $('#saveBtn').val("create-kharian");
            $('#kharian_id').val('');
            $('#kharianForm').trigger("reset");
            $('#modelHeading').html("Buat Pemasukan Harian");
            $('#ajaxModel').modal('show');
        });
        
        $('body').on('click', '.editKharian', function () {
          var kharian_id = $(this).data('id');
          $.get("{{ route('ajaxkharians.index') }}" +'/' + kharian_id +'/edit', function (data) {
              $('#modelHeading').html("Ubah Masukan Harian");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#kharian_id').val(data.id);
              $('#tanggal').val(data.tanggal);
              $('#koderekening').val(data.koderekening);
              $('#namapegawai').val(data.namapegawai);
              $('#uraian').val(data.uraian);
              $('#jumlahanggaran').val(data.jumlahanggaran);
          })
       });
        
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
              data: $('#kharianForm').serialize(),
              url: "{{ route('ajaxkharians.store') }}",
              type: "POST",
              dataType: 'json',
              success: function (data) {
         
                  $('#kharianForm').trigger("reset");
                  $('#ajaxModel').modal('hide');
                  table.draw();
             
              },
              error: function (data) {
                  console.log('Error:', data);
                  $('#saveBtn').html('Save Changes');
              }
          });
        });
        
        $('body').on('click', '.deleteKharian', function () {
         
            var kharian_id = $(this).data("id");
            confirm("Are You sure want to delete !");
          
            $.ajax({
                type: "DELETE",
                url: "{{ route('ajaxkharians.store') }}"+'/'+kharian_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
         
      });

      //Date picker


    </script>




</body>



</html>