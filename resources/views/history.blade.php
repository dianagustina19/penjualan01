@extends('index')

@section('content')  
   <div class="container px-4 px-lg-5 mt-5">
            @php
                $cek = count($list);
            @endphp
            @if($cek!=0)
            @foreach($list as $item)
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100 d-flex flex-row">
                            <img class="card-img-top flex-grow-1" src="data:image/png;base64,{{ $item->image }}" style="max-width: 200px; max-height: 200px;">
                            <div class="card-body p-4">
                                <div class="d-flex flex-column justify-content-between">
                                    <h5 class="fw-bolder">{{ $item->product_name }}</h5>
                                    <div>
                                        Rp. {{ number_format($item->price) }}
                                    </div>
                                    <h6>quantity : {{ $item->quantity }}</h6>
                                    <h6>Date : {{ $item->updated_at}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <center>
                    <div class="border border-primary text-center d-inline-block p-3 rounded">
                        <h5><b>No history</b></h5>
                    </div>
                </center>
            @endif
            </div>
        </div>
@endsection