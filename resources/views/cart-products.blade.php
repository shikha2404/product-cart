@include('header')
@include('sidebar')

<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

         <div class="col-md-12">
            @if(session()->has('success_msg'))
                        
            <div class="alert alert-info">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span> <b> Success - </b>  {{ session()->get('success_msg') }} </span>
            </div>
            @endif

            @if(session()->has('error_msg'))

            <div class="alert alert-danger">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span> <b> Fail - </b> {{ session()->get('error_msg') }}</span>
            </div>

            @endif
           </div>  
           <div class="card data-tables">
          <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
            <div class="toolbar">
  
            <a href="{{url('buy-products')}}" class="btn btn-info btn-wd" style="float: right;" > Buy Now </a>
              <!-- Here you can write extra buttons/actions for the toolbar  -->
              <center>
                <h4 class="card-title"> My Cart Products List </h4>
              </center>
            </div>
            <div class="fresh-datatables">
              <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Image</th>
                    <th>Quantity</th>  
                                  
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                
                <tbody> @php $i= 0; @endphp @foreach($cartProducts as $product) @php $i++; @endphp <tr>
                    <td> {{$i}}. </td>
                     
                    <td> {{$product->product_name }} </td>
                    <td> {{$product->product_sku }} </td>
                    
                    <td> @if($product->image!='') <img src="{{URL::to('public/uploads/image/'.$product->image)}}" height="70" width="70" > @endif </td>
                    <td class="qtyUpdate" > @if($product->quantity==0) 
                      <p style="color:red" > {{ 'Out of Stock' }} </p> @else {{$product->quantity}} @endif </td>
                     
                    <td class="text-right">
                      
                     <a href="{{url('removeProductFromCart/'.encrypt($product->id))}}" class="btn btn-link btn-danger" onclick="return confirm('Do you really want to remove product from Cart');">
                        <i class="fa fa-trash"></i>
                     </a>
                       
                    </td>

                  </tr> @endforeach </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  -->
</div>undefined</div> @include('footer')