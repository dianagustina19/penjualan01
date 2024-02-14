@extends('index')

@section('content')  
   <div class="container px-4 px-lg-5 mt-5">
        @include('progress')
        @php
            $totalPayment = 0;
            $cek = count($chart);
        @endphp
        @if($cek!=0)
            @foreach($chart as $item)
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100 d-flex flex-row position-relative"> <!-- Tambahkan kelas position-relative -->
                            <!-- Product image-->
                            <img class="card-img-top flex-grow-1" src="data:image/png;base64,{{ $item->image }}" style="max-width: 200px; max-height: 200px;">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="d-flex flex-column justify-content-between align-items-start"> <!-- Menambahkan align-items-start -->
                                    <h5 class="fw-bolder">{{ $item->product_name }}</h5>
                                    <h6>{{ $item->quantity }} {{ $item->unit}}</h6>
                                    <div>
                                        Total Order : Rp. {{ number_format($item->subtotal)}}
                                    </div>
                                </div>
                            </div>
                            <div class="text-end position-absolute top-0 end-0" style="margin: 5px;">
                                <a href="{{ route('delProduct', $item->id) }}" class="btn btn-danger"><b>X</b></a>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $totalPayment += $item->subtotal;
                @endphp
            @endforeach
            <center>
            <div class="border border-primary text-center d-inline-block p-3 rounded">
                <h5><b>TOTAL PAYMENT : Rp. {{ number_format($totalPayment) }}</b></h5>
            </div>
            <br><br>
            <div>
                <div class="bg-primary text-white p-3 rounded text-center d-inline-block">
                    <form action="{{ route('confirm') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="name" value="{{Auth::user()->id}}">
                        <button class="btn btn-primary" type="submit">Confirm</button>
                    </form>
                </div>
            </div>
            </center>
        @else
            <center>
                <div class="border border-primary text-center d-inline-block p-3 rounded">
                    <h5><b>No products in the cart please select first in the product menu</b></h5>
                </div>
            </center>
        @endif
    </div>
@endsection