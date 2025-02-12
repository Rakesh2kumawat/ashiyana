<!DOCTYPE html>
<html lang="en">
    
 <head>
        <meta charset="utf-8" />
        {{-- <link rel="icon" type="fav.ico" href="https://www.ashianahousing.com/images/fav.png" /> --}}
        <link rel="icon" type="fav.ico" href="{{asset('admin/assets/images/fav.png')}}" />

        <title>Ashiana Housing Ltd - Indian Real Estate Property Developer since 1986</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
		
		<link rel="stylesheet" href="{{asset('admin/assets/css/icons.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/assets/css/app.min.css')}}">

    </head>

    <body>

        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- LOGO -->
                    <a href="{{ route('dashboard.index') }}" class="logo text-center">
                       <span class="logo-lg">
                            <h3 style="color:white">Ashiana Housing Ltd.</h3>
                        </span>
                        <span class="logo-sm">
                            <h3 style="color:white">Ashiana Housing Ltd.</h3>
                        </span>


                        <!-- <span class="logo-lg">
                            <img src="{{asset('admin/assets/images/ashiana_logo.jpg')}}" alt="Logo" />
                        </span>
                        <span class="logo-sm">
                            <img src="{{asset('admin/assets/images/ashiana_logo.jpg')}}" alt="Logo" />
                        </span> -->
                        


                    </a>

                    <!--- Sidemenu -->
                    <ul class="metismenu side-nav">

                    <li class="side-nav-item">
                            <a href="{{ route('dashboard.total_application')}}" class="side-nav-link">
                                <i class="dripicons-view-apps"></i>
                                <span>Flat Units & Applications </span>
                            </a>
                            
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('customers.index')}}" class="side-nav-link">
                                <i class="dripicons-view-apps"></i>
                                <span>Applications</span>
                            </a>
                        </li>

                        
                        <li class="side-nav-item">
                            <a href="{{route('category.index')}}" class="side-nav-link">
                                <i class="dripicons-document"></i>
                                <span>Flats</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('dashboard.index') }}" class="side-nav-link">
                                <i class="dripicons-meter"></i>
                                <span>Allotment Process</span>
                            </a>
                        </li>

                       
            
						 <li class="side-nav-item">
                            <a href="{{ route('allocations.index')}}" class="side-nav-link">
                                <i class="dripicons-view-apps"></i>
                                <span>Allotted Units</span>
                            </a>
                            
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('remaining-view')}}" class="side-nav-link">
                                <i class="dripicons-view-apps"></i>
                                <span>Remaining Units</span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="{{ route('remaining-allocations')}}" class="side-nav-link">
                                <i class="dripicons-view-apps"></i>
                                <span>Remaining Units Allocations</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('reservation-view')}}" class="side-nav-link">
                                <i class="dripicons-view-apps"></i>
                                <span>Waiting List</span>
                            </a>
                            
                        </li>

                       


                      

                    </ul>

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
			<div class="content-page">
					<div class="content">
					<div class="navbar-custom">
					<ul class="list-unstyled topbar-right-menu float-right mb-0">

                           <?php $user = Auth::user(); ?>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="{{asset('admin/assets/images/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">{{ $user->email}}</span>
                                        <span class="account-position">{{ $user->name}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                   
                                    <!-- item-->
                                    <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>
                        
					</div>
					   @yield("content")
					</div>
			</div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

		<script src="{{asset('admin/assets/js/app.min.js')}}"></script>
		<script src="{{asset('assets/js/pages/demo.widgets.js')}}"></script>

    </body>

</html>
