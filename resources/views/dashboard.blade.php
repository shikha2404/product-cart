@include('header')
<!-- // Sidebar -->
@include('sidebar')
           
<!-- End Navbar -->
<div class="content">

<div class="container-fluid">

    @if (Session::has('success_msg'))
      <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif

    <div class="row">
         
        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">

                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-chart text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <a href="{{url('getAllUsers')}}"> <div class="numbers">
                                <p class="card-category">No.of Products </p>
                                <h4 class="card-title">  </h4>
                            </div> </a>
                        </div>
                    </div>
                </div>

                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Users
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-light-3 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="numbers">
                                <p class="card-category"> No. of Products </p>
                                <h4 class="card-title"> 2 </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i> Products
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-vector text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="numbers">
                                <p class="card-category"> Active Users</p>
                                <h4 class="card-title">23</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> Products
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-favourite-28 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="numbers">
                                <p class="card-category"> Products </p>
                                <h4 class="card-title"> 10 </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Products
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('footer')