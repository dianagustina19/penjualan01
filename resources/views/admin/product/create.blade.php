@extends('admin.master')

@section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
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
                            Product
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text" name="product_name" id="product_name" class="form-control">
                                    @if ($errors->has('product_name'))
                                        <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="discount" class="form-label">Discount <span style='font-size:10px'>(only number not using %)</span></label>
                                    <input type="number" name="discount" id="discount" class="form-control">
                                    @if ($errors->has('discount'))
                                        <span class="text-danger">{{ $errors->first('discount') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="currency" class="form-label">Currency</label>
                                    <input type="text" name="currency" id="currency" class="form-control" maxlength="5" oninput="this.value = this.value.toUpperCase()">
                                    @if ($errors->has('currency'))
                                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="dimension" class="form-label">Dimension</label>
                                    <input type="text" name="dimension" id="dimension" class="form-control">
                                    @if ($errors->has('dimension'))
                                        <span class="text-danger">{{ $errors->first('dimension') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="Unit" class="form-label">Unit</label>
                                    <input type="text" name="unit" id="unit" class="form-control">
                                    @if ($errors->has('unit'))
                                        <span class="text-danger">{{ $errors->first('unit') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="ttd">Image <span style='font-size:10px'>(Max 1Mb)</span></label>
                                    <br>
                                        <img src="{{ asset('assets/images/nophoto.jpg') }}" alt="Image Preview" class="img-thumbnail" id="gambar_preview" style="max-width: 150px;">
                                    <br><br>
                                    <input type="file" name="gambar" id="gambar" class="form-control">
                                    <input type="hidden" name="gambar_base64" id="gambar_base64">
                                    @if ($errors->has('gambar'))
                                        <span class="text-danger">{{ $errors->first('gambar') }}</span>
                                    @endif
                                </div>
                            </div>
                                    
                            <div class="flex-grow-1 d-flex align-items-center justify-content-end">
                                <button class="btn btn-primary" style="margin-right: 10px;">Save</button>
                                <a href="{{route('admin.product.index')}}" class="btn btn-danger">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
        </section>
    </div>
</section>
@endsection
@section('scripts')
<script>
    document.getElementById('gambar').addEventListener('change', function (e) {
        const fileInput = e.target;
        const ttdPreview = document.getElementById('gambar_preview');
        const ttdBase64Input = document.getElementById('gambar_base64');

        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
            const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            const maxSize = 1024 * 1024; // 1MB

            if (file.size > maxSize) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Terlalu Besar',
                    text: 'Ukuran file melebihi batas maksimum (1MB).',
                });
                fileInput.value = "";
                return;
            }

            if (!allowedTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format File Tidak Valid',
                    text: 'Hanya file Gambar yang diizinkan.',
                });
                fileInput.value = "";
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                ttdPreview.src = e.target.result;
                ttdBase64Input.value = e.target.result.split(',')[1];
            };

            reader.readAsDataURL(file);
        } else {
            ttdPreview.src = "{{ asset('assets/images/nophoto.jpg') }}";
            ttdBase64Input.value = "";
        }
    });
</script>
@endsection