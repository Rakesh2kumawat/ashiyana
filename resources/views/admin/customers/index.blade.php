@extends('admin.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Ashiana Nitara Phase 1A - New Final Publication of Applicant list</h4>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('customer.search') }}">
            @csrf
            <div class="container-fluid">
            <div class="row align-items-end">
                <div class="col-md-5">

                    <div class="mb-2">
                        <label for="applied_for">Flat Category</label>
                        <select id="applied_for" name="applied_for" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="LIG">LIG</option>
                            <option value="EWS">EWS</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-5">

                        <div class="mb-2" >
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control" required>
                                <option value="">Select Category Type</option>
                                <option value="General" {{ old('category') == 'General' ? 'selected' : '' }}>General
                                </option>
                                <option value="ST" {{ old('category') == 'ST' ? 'selected' : '' }}>ST</option>
                                <option value="SC" {{ old('category') == 'SC' ? 'selected' : '' }}>SC</option>
                                <option value="ARMY" {{ old('category') == 'ARMY' ? 'selected' : '' }}>ARMY</option>
                                <option value="Govt" {{ old('category') == 'Govt' ? 'selected' : '' }}>Govt</option>
                                <option value="Handicap" {{ old('category') == 'Handicap' ? 'selected' : '' }}>Handicap
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="mb-2" >
                            <button type='submit' class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </form>



        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">

                <div class="table-responsive-sm">
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Application. Id</th>
                                <th>Application Date</th>
                                <th>Applicant Name</th>
                                <th>Co-Applicant Name</th>
                                <th>Phone Number</th>
                                {{-- <th>Type</th> --}}
                                <th>Category</th>
                                <th>Applied For</th>
                                {{-- <th>Action</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($result as $value)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $value->application_no }}</td>
                                    <td>{{ date('d-M-Y', strtotime($value->application_date)) }}</td>
                                    <td>{{ ucwords($value->applicant_name) }}</td>
                                    <td>{{ ucwords($value->co_applicant_name) }}</td>
                                    <td>{{ $value->mobile_number }}</td>
                                    {{-- <td>{{ ucwords($value->type) }}</td> --}}
                                    <td>{{ $value->category }}</td>
                                    <td>{{ $value->applied_for }}</td>
                                    <td>
                                        {{-- <a href="{{ route('customer.editdata', [$value->id]) }}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.content-wrapper -->
@endsection
