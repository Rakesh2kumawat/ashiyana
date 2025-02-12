@extends('admin.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Ashiana Nitara Phase 1A - Final Allotment list</h1>
                    <a class="btn btn-primary" role="button" href="{{route('allocation.excel.export')}}">Excel</a>
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
                
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Flat No</th>
                                <th>Flat Category</th>
                                <th>Application No</th>
                                <th>Applicant Name</th>
                                <th>Co-Applicant Name</th>
                                <th>Phone Number</th>
                                <th>Category</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =1; ?>
                            @foreach($all_alots as $value)

                          <?php   
                          $flat_id = $value->flat_id;
                          $flat_name = App\Models\Flat::where('id',$flat_id)->first();

                          $customer_id = $value->customers_id;
                          $customer_name = App\Models\Customers::where('id',$customer_id)->first();
                        //   dd($customer_name);
                          $category = $customer_name->category;
                          ?>

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $flat_name->flats_no ?: '--' }}</td>
                                <td>{{ $flat_name->category ?: '--' }}</td>
                                <td>{{ $customer_name->application_no ?: '--' }}</td>
                                <td>{{ $customer_name->applicant_name ?: '--' }}</td>
                                <td>{{ $customer_name->co_applicant_name ?: '--' }}</td>
                                <td>{{ $customer_name->mobile_number ?: '--' }}</td>
                                <td>{{ $category ?? '--' }}</td>

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>		
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection