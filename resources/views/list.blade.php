@extends('index')

@section('content')  
   <div class="container px-4 px-lg-5 mt-5">
            @include('progress')
            
            @foreach($list as $item)
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100 d-flex flex-row">
                            <!-- Product image-->
                            <img class="card-img-top flex-grow-1" src="data:image/png;base64,{{ $item->image }}" style="max-width: 200px; max-height: 200px;">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="d-flex flex-column justify-content-between">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->product_name }}</h5>
                                    <!-- Prices -->
                                    <div>
                                        @if($item->discount != null)
                                            <s>Rp. {{ number_format($item->price)}}</s> <span class="badge bg-danger">Diskon {{ $item->discount }}%</span>
<br>
                                            Rp. {{ number_format($item->price - ($item->price * $item->discount / 100)) }}
                                        @else
                                            Rp. {{ number_format($item->price) }}
                                        @endif
                                    </div>
                                    <!-- Product actions-->
                                    <div class="text-end">
                                        <a class="btn btn-primary" href="{{ route('detail', $item->id) }}">Buy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
@endsection