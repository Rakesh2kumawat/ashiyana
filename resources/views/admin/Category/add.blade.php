@extends('admin/main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
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
                        <form action="{{ route('category.add.submit') }}" method='post' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Flat Category Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Flat  Category Name">
                                    </div>
                                    @error('name')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                              
                            </div>

                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type='submit' class="btn btn-primary">Create</button>
                    <a href="{{ route('category.add') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>


                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
