@include('header') @include('sidebar')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card ">
					<div class="card-header ">
						<h4 class="card-title"> Edit Product Details </h4>
					</div>
					<div class="card-body ">
						<form method="post" action="{{url('product-details-edit')}}" class="form-horizontal" enctype='multipart/form-data' >
							@csrf

                            <input type="hidden" name="product_id" value="{{$product->id}}" >
							<fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product Name </label>
										<div class="col-sm-10">
											<input type="text" name="product_name" class="form-control" value="{{$product->product_name}}" >
										</div>
									</div>
								</div>
							</fieldset>

                            <fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product SKU </label>
										<div class="col-sm-10">
											<input type="text" name="product_sku" class="form-control" value="{{$product->product_sku}}" >
										</div>
									</div>
								</div>
							</fieldset> 

                            <fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Uploaded Image </label>
										<div class="col-sm-10">
                                        <img src="{{URL::to('public/uploads/image/'.$product->image)}}" height="70" width="70" >
										</div>
									</div>
								</div>
							</fieldset>
							
                            <fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product Image </label>
										<div class="col-sm-10">
											<input type="file" name="image" class="form-control"  >
										</div>
									</div>
								</div>
							</fieldset> 

							<fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Description</label>
										<div class="col-sm-10">
											<textarea type="text" placeholder="placeholder" class="form-control" name="description" > {{$product->description}} </textarea>
										</div>
									</div>
								</div>
							</fieldset>  

							<fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product Qty </label>
										<div class="col-sm-10">
											<input type="number" name="quantity" class="form-control" value="{{$product->quantity}}" >
										</div>
									</div>
								</div>
							</fieldset> 

							<fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product Price </label>
										<div class="col-sm-10">
											<input type="number" name="price" class="form-control" value="{{$product->price}}" >
										</div>
									</div>
								</div>
							</fieldset> 
							 
							<button type="submit" class="btn btn-info" > Submit  </button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('footer')