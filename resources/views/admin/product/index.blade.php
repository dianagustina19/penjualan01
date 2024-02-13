@extends('admin.master')

@section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                            <i class="nav-icon far fa-image"></i>
                            List Product
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                                    <span>
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Add Product
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table" id="tableData">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Currency</th>
                                        <th>Discount</th>
                                        <th>Dimension</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $key => $list)
                                    <tr>
                                        <td>{{ $key+1}}.</td>
                                        <td><img src="data:image/png;base64,{{ $list->image }}" alt="Preview" class="img-thumbnail" id="ttd_preview" style="max-width: 150px;"></td>
                                        <td>{{ $list->product_code}}</td>
                                        <td>{{ $list->product_name}}</td>
                                        <td>{{ $list->price}}</td>
                                        <td>{{ $list->currency}}</td>
                                        <td>{{ $list->discount}}</td>
                                        <td>{{ $list->dimension}}</td>
                                        <td>{{ $list->unit}}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $list->id)}}" class="btn btn-warning">
                                                <span>
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                            </a>
                                            <a href="{{ route('admin.product.delete', $list->id)}}" class="btn btn-danger">
                                                <span>
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
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