@extends('index')

@section('content')  
   <div class="container px-4 px-lg-5 mt-5">
        @include('progress')

        <center>
        <div class="border border-primary text-center d-inline-block p-3 rounded">
            <h5><b>Congratulations on a successful purchase</b></h5>
                <p>You have successfully made a purchase.</p>
                <p>this page will automatically close and will enter the home page</p>
        </div>
        </center>
    </div>
@endsection
<script>
    setTimeout(function(){
        window.location.href = "{{ route('list') }}";
    }, 5000);
</script>