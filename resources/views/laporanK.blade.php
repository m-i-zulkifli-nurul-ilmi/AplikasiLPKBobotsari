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

    <title align="center">Laporan Keuangan Pasar Bobotsari</title>


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
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

    {{-- js --}}
    <script src="{{ asset('js/app.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/api/sum().js"></script>


    <script src="{{ asset('js/bootstrap/bootstrap-datepicker.min.js') }}"></script>
    {{-- css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" />


    <link href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css" rel="stylesheet">



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

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">LKP Bobotsari</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <h4 class="putih">Laporan Pengeluaran</h4>
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
                            <a class="nav-link" href="{{ url('ktambah') }}">
                                <span data-feather="shopping-cart"></span>
                                Pengeluaran
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('laporan') }}">
                                <span data-feather="bar-chart-2"></span>
                                Laporan Pemasukan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('laporanK') }}">
                                <span data-feather="bar-chart-2"></span>
                                Laporan Pengeluaran
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">



                <div class="row input-daterange">
                    <div class="col-md-4">
                        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"
                            readonly />
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"
                            readonly />
                    </div>

                    <div class="col-md-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                    </div>
                </div>
                <br />

                <table class="table table-bordered data-table " style="width:100%" id="kharians">

                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Id</th>
                            <th>Tanggal</th>
                            <th>Kode Rekening</th>
                            <th>Nama Pegawai</th>
                            <th>Uraian</th>
                            <th>Jumlah Anggaran</th>

                        </tr>
                    </thead>
                    <tfoot align="right">
                        <tr>

                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>





            </main>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{-- <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous">
    </script> --}}



</body>



</html>



<!-- Icons -->
<script src="{{ asset('js/feather-icons/feather.min.js') }}"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->

{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script> --}}



<script type="text/javascript">
    $(document).ready(function(){

        $('.input-daterange').datepicker({
        todayBtn:'linked',
        format:'yyyy-mm-dd',
        autoclose:true
        });
        
        
        load_data();
       
        function load_data(from_date = '', to_date = '')
        {            
           var aw = $('#kharians').DataTable({            
                dom: 'lBfrtip',
                buttons: [        
                {
                    extend: 'print',
                    text: '<button type="button" class="btn btn-secondary btn-sm">Print</button>',
                    titleAttr: 'Print',
                    footer: true,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                // {
                //     extend :    
                // }
                // { extend: 'copyHtml5', footer: true },
                // { extend: 'excelHtml5', footer: true },
                // { extend: 'csvHtml5', footer: true },
                // { extend: 'pdfHtml5', footer: true }
                
                ],
            
                processing: true,
                serverSide: true,
                ajax: {
                
                url:'{{ route("laporanK.index") }}',
                
                data:{from_date:from_date, to_date:to_date},
            
            },

            columns: [   
                { "data": null,
                    "sortable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },              
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'tanggal',
                    name:'tanggal'
                },
                {
                    data:'koderekening',
                    name:'koderekening'
                },
                {
                    data:'namapegawai',
                    name:'namapegawai'
                },
                {
                    data:'uraian',
                    name:'uraian'
                },
                {
                    data:'jumlahanggaran',
                    name:'jumlahanggaran'
                }
            ],
            
        

            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
            typeof i === 'number' ?
            i : 0;
            };
            
            // Total over all pages
            total = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
            return intVal(a) + intVal(b);
            }, 0 );
            
            // Total over this page
            pageTotal = api
            .column( 6, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
            return intVal(a) + intVal(b);
            }, 0 );
            
            // Update footer
            $( api.column( 5 ).footer() ).html('Total');
            $( api.column( 6 ).footer() ).html(
            'Rp '+pageTotal );
            
            
            }
            
            
            
            });

            // aw.on( 'order.dt search.dt', function () {
            // aw.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            // cell.innerHTML = i+1;
            // } );
            // } ).draw();
        
        }
        
        $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' && to_date != '')
        {
        $('#kharians').DataTable().destroy();
        load_data(from_date, to_date);
        }
        else
        {
        alert('Both Date is required');
        }
        });
        
        $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#kharians').DataTable().destroy();
        load_data();
        });
        
        
        } );
</script>