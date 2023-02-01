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
 
              <div class="card-footer ml-auto mr-auto">
                <a href="{{url('add-product')}}" class="btn btn-info btn-wd" style="float: right;" > Add Product </a>
              </div>
              <!-- Here you can write extra buttons/actions for the toolbar  -->
              <center>
                <h4 class="card-title"> All Products List </h4>
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
                    <th>Stock</th>  
                    <th>Price</th> 
                    <th> Add to Cart </th>                   
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                
                <tbody> @php $i= 0; @endphp @foreach($allProducts as $product) @php $i++; @endphp <tr>
                    <td> {{$i}}. </td>
                     
                    <td> {{$product->product_name }} </td>
                    <td> {{$product->product_sku }} </td>
                    
                    <td> @if($product->image!='') 
                     
                      <img src="{{URL::to('public/uploads/image/'.$product->image)}}" height="70" width="70" >  @else {{'NA'}}  @endif </td>
                      
                    <td class="qtyUpdate" > @if($product->quantity==0) 
                      <p style="color:red" > {{ 'Out of Stock' }} </p> @else {{$product->quantity}} @endif </td>
                    <td> {{$product->price }}  </td>
                    
                      <td> 
                       
                      <a class="login-trigger" href="#" data-target="#login{{$product->id}}" data-toggle="modal"> Add to Cart </a>

                    </td>
                    <td class="text-right">
                      
                     <a href="{{url('removeProduct/'.encrypt($product->id))}}" class="btn btn-link btn-danger" onclick="return confirm('Do you really want to delete');">
                        <i class="fa fa-times"></i>
                      </a>
                       <a href="{{url('editProduct/'.encrypt($product->id))}}" class="btn btn-link  edit"><i class="fa fa-pencil"></i></a>  
                    </td>

                    <!-- // pop up form -->
                    <div id="login{{$product->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        
                        <div class="modal-content">
                          <div class="modal-body">
                            <button data-dismiss="modal" class="close">&times;</button>
                            <h4> Add to Cart </h4>
                            <form method="post" action="{{url('addToCrt')}}" >
                              @csrf
                              <input type="hidden" name="prod_id" value="{{$product->id}}" >
                              <input type="text" name="sku" class="username form-control" placeholder="Username" readonly value="{{$product->product_sku}}" />
                              <input type="number" name="qty" class="password form-control" placeholder="Quantity" min="1" max="{{$product->quantity}}" required />
                               
                              <button type="submit" class="btn btn-info" > Submit </button>
                            </form>
                          </div>
                        </div>
                      </div>  
                    </div>

                    <!-- // finish pop up form -->

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