    <nav class="navbar navbar-expand-lg" style="background-color:#5f9ea0;">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Shop Start</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    
                </ul>
                <form class="d-flex">
                <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p style="color:red">
                                    Logout
                                </p>
                            </button>
                            <!-- <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Logout
                            </button> -->
                        </form> 
                   
                </form>
            </div>
        </div>
    </nav>