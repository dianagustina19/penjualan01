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

        <!-- Main content -->
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
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="daterange" id="daterange" autocomplete="off" placeholder="--Select Date--">
                            </div>
                            <div class="form-group col-md-3 mt-3">
                                <div>
                                    <button class="btn btn-primary" id="btn-search">Show Data</button>
                                </div>
                            </div>
                            <button class="btn btn-danger" id="export-button">
                                <span>
                                    <i class="fa fa-print"></i>
                                </span> &nbsp; Export
                            </button>
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
        let filterSearch = '';
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
                    filterSearch        = d.search?.value;
                    d.document_code     = $('#document_code').val();
                    d.user              = $('#user').val();
                    d.total             = $('#total').val();
                    d.date              = $('#date').val();
                    d.item              = $('#item').val();
                    d.daterange         = $('#daterange').val();
                }
            },
            columns: [
                {data: 'document_code', name: 'document_code'},
                {data: 'user', name: 'user'},
                {data: 'total', name: 'total'},
                {data: 'date', name: 'date'},
                {data: 'item', name: 'item'},
            ]
        });

        $('.form-control').on('change', function() {
            table.draw();
        });

        $('#daterange').on('change', function() {
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

            var document_code            = $('#document_code').val();
            var user            = $('#user').val();
            var total            = $('#total').val();
            var date            = $('#date').val();
            var item            = $('#item').val();
            var daterange       = $('#daterange').val();

            var url = '{{ route("admin.report.export") }}?' + $.param({
                document_code        : document_code,
                user        : user,
                total        : total,
                date        : date,
                item        : item,
                keyword     : filterSearch,
                daterange       : daterange,
            });

            $('.loading-overlay').show();

            window.location.href = url;

            setTimeout(hideOverlay, 2000);
        });

        $(document).ready(function() {
            $('.loading-overlay').hide();
        });

        table.on('click', '.deleteData', function() {
            let name = $(this).data('name');
            let id = $(this).data('id');
            let form = $(this).data('form');

            Swal.fire({
                title: "Are you sure?",
                text: `Data ${name} will be deleted`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3577f1",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#${form}${id}`).submit();
                }
            });
        })
    });
</script>
@endsection