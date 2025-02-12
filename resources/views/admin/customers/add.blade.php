@extends('admin/main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Applicant</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{route('customers.index')}}" class="btn btn-primary">Back</a>
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
                        <form action="{{route('customer.register')}}" method='post' enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="application_no">Application No.</label>
                                        <input type="text" name="application_no" value="{{ old('application_no')}}" id="name" class="form-control"
                                            placeholder="Enter Application No.">
                                    </div>
                                    @error('application_no')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="application_date">Application Date.</label>
                                        <input type="date" name="application_date" value="{{ old('application_date')}}" id="name" class="form-control"
                                            placeholder="Enter Application No.">
                                    </div>
                                    @error('application_date')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="applicant_name">Applicant Name</label>
                                        <input type="text" name="applicant_name" value="{{ old('applicant_name')}}" id="applicant_name" class="form-control"
                                            placeholder="Enter Applicant Name">
                                    </div>
                                    @error('applicant_name')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="co_applicant_name">Co-Applicant Name</label>
                                        <input type="text" name="co_applicant_name" value="{{ old('co_applicant_name')}}" id="co_applicant_name" class="form-control"
                                            placeholder="Enter Co Applicant Name">
                                    </div>
                                    @error('co_applicant_name')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="text" name="mobile_number" value="{{ old('mobile_number')}}" id="mobile_number" class="form-control"
                                            placeholder="Enter Mobile Number">
                                    </div>
                                    @error('mobile_number')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category">Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option value="">Select Category Type</option>
                                            <option value="General" {{ old('category') == 'General' ? 'selected' : '' }}>General</option>
                                            <option value="ST" {{ old('category') == 'ST' ? 'selected' : '' }}>ST</option>
                                            <option value="SC" {{ old('category') == 'SC' ? 'selected' : '' }}>SC</option>
                                            <option value="ARMY" {{ old('category') == 'ARMY' ? 'selected' : '' }}>ARMY</option>
                                            <option value="Govt" {{ old('category') == 'Govt' ? 'selected' : '' }}>Govt</option>
                                            <option value="Handicap" {{ old('category') == 'Handicap' ? 'selected' : '' }}>Handicap</option>
                                        </select>
                                    </div>
                                    @error('category')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>




                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="applied_for">Applied For</label>
                                        <select id="applied_for" name="applied_for" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="LIG">LIG</option>
                                            <option value="EWS">EWS</option>
                                        </select>
                                    </div>
                                    @error('applied_for')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>





                               

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="type">Type</label>
                                        <select id="type" name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="employee">Employee</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                    @error('type')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                 
                            </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type='submit' class="btn btn-primary">Create</button>
                    <a href="{{route('customers.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>


                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
