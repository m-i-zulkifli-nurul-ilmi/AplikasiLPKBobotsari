<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('asset/images/ico.png') }}">



    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">


<title>Laporan Keuangan Pasar Bobotsari</title>

    {{-- ulala --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


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

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{ url('') }}">LKP Bobotsari</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">



                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li> --}}
                </ul>
                {{-- <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> --}}
            </div>
        </nav>
    </header>


    <p>
        <main role="main">
           
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

            <table class="table table-bordered data-table " style="width:100%" id="pharians">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal</th>
                        <th>Nama Pegawai</th>
                        <th>Keterangan</th>
                        <th>Jumlah Pemasukan</th>

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
                $('#pharians').DataTable({
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
                    }
                    
                    ],
        
                
        
                
                processing: true,
                serverSide: true,
                ajax: {
                
                url:'{{ route("laporan.index") }}',
                
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
                data:'namapegawai',
                name:'namapegawai'
                },
                {
                data:'keterangan',
                name:'keterangan'
                },
                {
                data:'jumlahpemasukan',
                name:'jumlahpemasukan'
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
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                return intVal(a) + intVal(b);
                }, 0 );
                
                // Total over this page
                pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                return intVal(a) + intVal(b);
                }, 0 );
                
                // Update footer
                $( api.column( 4 ).footer() ).html('Total');
                $( api.column( 5 ).footer() ).html(
                'Rp '+pageTotal );
                
                
                }
                
                
                
                });
                
                }
                
                $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                $('#pharians').DataTable().destroy();
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
                $('#pharians').DataTable().destroy();
                load_data();
                });
                
                
                } );
</script>