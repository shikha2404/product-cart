@include('header') @include('sidebar')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card ">
					<div class="card-header ">
						<h4 class="card-title"> Product Details </h4>
					</div>
					<div class="card-body ">
						<form method="post" action="{{url('product-details-add')}}" class="form-horizontal" enctype='multipart/form-data' >
							@csrf
							<fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product Name </label>
										<div class="col-sm-10">
											<input type="text" name="product_name" class="form-control"  >
										</div>
									</div>
								</div>
							</fieldset>

                            <fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product SKU </label>
										<div class="col-sm-10">
											<input type="text" name="product_sku" class="form-control"  >
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
											<textarea type="text" placeholder="placeholder" class="form-control" name="description" > </textarea>
										</div>
									</div>
								</div>
							</fieldset>  

							<fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product Qty </label>
										<div class="col-sm-10">
											<input type="number" name="quantity" class="form-control"  >
										</div>
									</div>
								</div>
							</fieldset> 

							<fieldset>
								<div class="form-group">
									<div class="row">
										<label class="col-sm-2 control-label"> Product Price </label>
										<div class="col-sm-10">
											<input type="number" name="quantity" class="form-control"  >
										</div>
									</div>
								</div>
							</fieldset>
							 
							<button type="submit" class="btn btn-info"  > Submit  </button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('footer')