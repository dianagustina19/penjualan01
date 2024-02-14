    <nav class="navbar navbar-expand-lg" style="background-color:#5f9ea0;">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('list') }}">Shop Start</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <ul class="navbar-nav">
                    <li>
                        <a href="{{ route('history') }}">order history</a>
                    </li>&nbsp;
                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form> 
            </div>
        </div>
    </nav>