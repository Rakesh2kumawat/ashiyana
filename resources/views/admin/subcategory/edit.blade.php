@extends('admin.main')
@section('content')

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">					
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update SubCategory</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="categories.html" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <form action="{{route('subcategory.edit.submit',$subcategory->id) }}"  method='post' enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Category</label>
                                    <select name="categoryid" id="" class="form-control">
                                    @foreach($category as $item)
                                        <option value="{{$item->id}}" {{$item->id==$subcategory->category_id?'selected':''}}>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input lass="form-control"type="text" name="name" id="name" value="{{$subcategory->name}}" c placeholder="Name">	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image">image</label>
                                    <input type="file" name="image" id="slug" class="form-control" placeholder="image">	
                                </div>
                            </div>
                            <img src="{{asset('asset/img/'.$subcategory->image)}}" style="width: 50px" alt="">									
                        </div>
                    </div>							
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary">Update</button>
                    <a href="" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection