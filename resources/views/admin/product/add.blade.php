@extends('admin/main')
@section('content')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Add Products </h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('product.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">		
								<form action="{{route('product.add.submit')}}" method='post' enctype="multipart/form-data"> 	
									@csrf					
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Category</label>
											<select name="category_id" id=""class="form-control" onchange="add_subcategory(this.value)">
												<option value="">Select Category</option>
												@foreach ($category as $item)
												  <option value="{{$item->id}}">{{$item->title}}</option>
												@endforeach
											</select>	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Subcategory</label>
											<select name="subcategory_id" id="subcategory" class="form-control">
											
										</select>
										</div>
									</div>
								
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="name">Price</label>
											<input type="text" name="price" id="name" class="form-control" placeholder="price">	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">image</label>
											<input type="file" name="image" id="image" class="form-control" placeholder="image">	
										</div>
									</div>									
								</div>

							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button  type='submit' class="btn btn-primary">Add</button>
							<a href="{{route('product.add')}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
							
							
					</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<script>
			    function add_subcategory(val){
                   var cat_id = val;

				  $.ajax({
					type: "post",
					url: "{{route('subcategory.get')}}",
					data: {
						id : cat_id,
						_token :"{{csrf_token()}}"
					},
					success: function (response) {
						$('#subcategory').html('');
						var a="";

						$.each(response, function (key, value) { 
							  a = a + `<option value="${value.id}">${value.name}</option>`
						});

						$('#subcategory').append(a);
					}
				  });
				}



			</script>
@endsection
