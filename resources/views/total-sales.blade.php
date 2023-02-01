@include('header')
@include('sidebar')

<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">

         <div class="col-md-12">
            
           </div>  
           <div class="card data-tables">
          <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
            <div class="toolbar">
   
              <!-- Here you can write extra buttons/actions for the toolbar  -->
              <center>
                <h4 class="card-title"> Total Sales </h4>
              </center>
            </div>
            <div class="fresh-datatables">
              <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th> Sale</th>
                    <th> Date</th>  
                    
                  </tr>
                </thead>
                
                <tbody> @php $i= 0; @endphp @foreach($purchase as $product) @php $i++; @endphp <tr>
                    <td> {{$i}}. </td>
                     
                    <td> {{$product->product_name }} </td>
                    <td> {{$product->product_sku }} </td>
                     
                    <td > {{$product->amount}} </td>
                     
                    <td class="text-right">
                    {{$product->created_at}} 
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