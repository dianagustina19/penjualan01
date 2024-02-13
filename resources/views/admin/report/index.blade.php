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
                            <table class="table" id="tableData">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Transaction</th>
                                        <th>User</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Item</th>
                                        <th>Action</th>
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
    $(document).ready(function() {
        $('#tableData').DataTable();
    });
</script>
@endsection