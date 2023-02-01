@include('header')
<!-- // Sidebar -->
@include('sidebar')
           
<!-- End Navbar -->
<div class="content">

<div class="container-fluid">

         <div class="col-md-12">
            @if(session()->has('success_msg'))
                        
            <div class="alert alert-info">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span> <b> Success - </b>  {{ session()->get('success_msg') }} </span>
            </div>
            @endif
         </div>

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
                                <p class="card-category">No.of Users </p>
                                <h4 class="card-title"> @if(isset($users)) {{count($users)}} @endif </h4>
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
                                <h4 class="card-title"> @if(isset($products)) {{count($products)}} @endif </h4>
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
                                <p class="card-category"> Cart Products </p>
                                <h4 class="card-title"> @if(isset($cart)) {{ count($cart)}} @endif </h4>
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
                                <p class="card-category"> Total Purchase </p>
                                <h4 class="card-title"> @if(isset($purchase[0])) {{$purchase[0]}} @endif </h4>
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