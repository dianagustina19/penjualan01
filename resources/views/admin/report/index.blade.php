@extends('admin.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="nav-icon fas fa-columns"></i>
                            List Report
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="daterange" id="daterange" autocomplete="off" placeholder="--Select Date--">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary" id="btn-search">Show Data</button>
                                    <button class="btn btn-danger" id="export-button">
                                        <span>
                                            <i class="fa fa-print"></i>
                                        </span> &nbsp; Export
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table class="table" id="tableData">
                            <thead class="table-light">
                                <tr>
                                    <th>Transaction</th>
                                    <th>User</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            showDropdowns: true,
            linkedCalendars: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    $(function() {
        var table = $('#tableData').DataTable({
            ordering: false,
            fixedHeader:true,
            scrollX: false,
            processing: true,
            serverSide: true,
            searching: false,
            language: {
                processing:
                    '<div class="spinner-border text-info" role="status">' +
                    '<span class="sr-only">Loading...</span>' +
                    "</div>",
                paginate: {
                    Search: '<i class="icon-search"></i>',
                    first: "<i class='fas fa-angle-double-left'></i>",
                    next: "Next <span class='mdi mdi-chevron-right'></span>",
                    last: "<i class='fas fa-angle-double-right'></i>",
                },
                "info": "Displaying _START_ - _END_ of _TOTAL_ result",
            },
            drawCallback: function() {
                var previousButton = $('.paginate_button.previous');
                previousButton.css('display', 'none');
            },
            ajax: {
                url: "{{ route('admin.report.index') }}",
                data: function (d) {
                    d.document_code     = $('#document_code').val();
                    d.userorg              = $('#userorg').val();
                    d.total             = $('#total').val();
                    d.date              = $('#date').val();
                    d.item              = $('#item').val();
                    d.daterange         = $('#daterange').val();
                }
            },
            columns: [
                {data: 'document_code', name: 'document_code'},
                {data: 'userorg', name: 'userorg'},
                {data: 'total', name: 'total'},
                {data: 'date', name: 'date'},
                {data: 'item', name: 'item'},
            ]
        });

        $('.form-control').on('change', function() {
            table.draw();
        });

        $('#btn-search').click(function(e){
            table.draw();
        });

        function hideOverlay() {
            $('.loading-overlay').fadeOut('slow', function() {
                $(this).remove();
            });
        }

        $('#export-button').on('click', function(event) {
            event.preventDefault(); 
            var daterange       = $('#daterange').val();

            var url = '{{ route("admin.report.export") }}?' + $.param({
                daterange       : daterange,
            });

            $('.loading-overlay').show();

            window.open(url, '_blank');

            setTimeout(hideOverlay, 2000);
        });

        $(document).ready(function() {
            $('.loading-overlay').hide();
        });
    });
</script>
@endsection