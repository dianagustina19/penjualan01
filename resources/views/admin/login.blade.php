<!doctype html>
<html lang="en">
    <head>
  	    <title>Login 04</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('admin_assets/loginpage/css/style.css') }}">
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="wrap">
						<div class="p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
							<form action="#" class="signin-form" autocomplete="off">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="new-username" required >
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="new-password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
		                    </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

    <script src="{{ asset('admin_assets/loginpage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/loginpage/js/popper.js') }}"></script>
    <script src="{{ asset('admin_assets/loginpage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/loginpage/js/main.js') }}"></script>
	</body>
</html>

