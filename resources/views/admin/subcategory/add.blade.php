@extends('admin/main')
@section('content')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Sub Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
                    <form action="{{route('subcategory.add.submit')}}" method='post'  enctype="multipart/form-data">
                    @csrf
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                    <div class="col-md-12">
										<div class="mb-3">
											<label for="name">Category</label>
											<select name="categoryid" id="category" class="form-control">
                                                @foreach($category as $item)
												<option value="{{$item->id}}">{{$item->title}}</option>
												@endforeach
                                            </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">	
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
							<button class="btn btn-primary">Create</button>
							<a href="subcategory.html" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</div> 
                </form>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
@endsection