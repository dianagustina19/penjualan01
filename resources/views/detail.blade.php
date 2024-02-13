@extends('index')

@section('content')  
    <div class="container px-4 px-lg-5 mt-5">
        <h3>Product Detail {{ $data->product_name }}</h3><br>
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100 d-flex flex-row">
                    <!-- Product image-->
                    <img class="card-img-top flex-grow-1" src="data:image/png;base64,{{ $data->image }}" style="max-width: 200px; max-height: 200px;">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="d-flex flex-column justify-content-between">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $data->product_name }}</h5>
                            <!-- Prices -->
                            <div>
                                <h5>
                                @if($data->discount != null)
                                    <s>Rp. {{ number_format($data->price)}}</s> <br>
                                    Rp. {{ number_format($data->price - ($data->price * $data->discount / 100)) }}
                                @else
                                    Rp. {{ number_format($data->price) }}
                                @endif
                                </h5>
                            </div>
                            <h6>Dimesion : {{ $data->dimension }}</h6>
                            <h6>Unit : {{ $data->unit }}</h6>
                            <!-- Product actions-->
                            <div class="text-end">
                                <form action="{{ route('chart') }}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <input type="hidden" name="code" value="{{ $data->product_code }}">
                                    <input type="hidden" name="name" value="1">
                                    <button class="btn btn-primary" type="submit">Buy</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection