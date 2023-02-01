<body>
     
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{ asset('public/assets/img/sidebar-5.jpg')}}">
          
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:void(0);" class="simple-text logo-mini">
                        EC
                    </a>
                    <a href="javascript:void(0);" class="simple-text logo-normal">
                        E-Cart
                    </a>
                </div>
                <div class="user">
                    <div class="photo">
                        <img src="{{ asset('public/assets/img/default-avatar.png')}}" />
                    </div>
                    <div class="info ">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span> Admin
                               <!--  <b class="caret"></b> -->
                            </span>
                        </a>
                         
                    </div>
                </div>

                <ul class="nav">
                  <?php $segment = request()->segment(1); ?>

                    <li class="nav-item @if($segment == 'dashboard'){{'active'}} @endif ">
                        <a class="nav-link" href="{{url('dashboard')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item @if($segment == 'getAllUsers'){{'active'}} @endif ">
                        <a class="nav-link" href="{{url('getAllUsers')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>User List</p>
                        </a>
                    </li>

                     <li class="nav-item @if($segment == 'getAllProducts'){{'active'}} @endif ">
                        <a class="nav-link" href="{{url('getAllProducts')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>All Products </p>
                        </a>
                    </li>

                    <li class="nav-item @if($segment == 'my-cart'){{'active'}} @endif ">
                        <a class="nav-link" href="{{url('my-cart')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p> My Cart </p>
                        </a>
                    </li>
 
                </ul>

                 </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->

            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>

                        <a class="navbar-brand" href="#pablo"> Welcome {{Session::get('admin_info')['full_name']}} !  </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="nav navbar-nav mr-auto">
                             
                        </ul>
                        <ul class="navbar-nav">
                             
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="https://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bullet-list-67"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{url('logout')}}" class="dropdown-item text-danger">
                                        <i class="nc-icon nc-button-power"></i> Log out
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>