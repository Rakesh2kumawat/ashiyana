<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Ashiana Housing Ltd.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
		
		<link rel="stylesheet" href="{{asset('admin/assets/css/icons.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/assets/css/app.min.css')}}">

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="{{route('admin.login')}}">
                                    <span><h3 style="color:white">Ashiana Housing Ltd.</h3></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                </div>
								

								<form class="login" method="post" action="{{Route('login')}}">
								@csrf
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input class="form-control" name="email" type="email" id="email" required="" placeholder="Enter your email">
										@if($errors->has('email'))
											<div class="text-danger">{{$errors->first('email')}}</div>
										@endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
										@if($errors->has('password'))
											<div class="text-danger">{{$errors->first('password')}}</div>
										@endif
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

       

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
    </body>

</html>
