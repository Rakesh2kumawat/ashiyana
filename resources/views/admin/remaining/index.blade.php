@extends('admin/main')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap");

    .cLoaderWrap {
        text-align: center;
        width: 200px;
        margin: 0 auto;
        position: relative;
        font-style: normal;
        display: block;
    }

    #cLoaderSVG {
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
        width: 200px;
        height: 200px;
        display: block;
    }

    .cLoader {
        stroke-dashoffset: 440;
        stroke-dasharray: 440;
        -webkit-transition: all 1s linear;
        transition: all 1s linear;
        r: 70;
        cy: 100;
        cx: 100;
        fill: none;
        stroke-width: 5px;
        stroke: #c98ada;
    }

    .cLoader.done {
        stroke: #7d0bbd;
    }

    .cPath {
        stroke-dashoffset: 0;
        stroke-dasharray: 440;
        r: 70;
        cy: 100;
        cx: 100;
        stroke-width: 12px;
        stroke: #f0f0f0;
        fill: none;
    }

    .cCount {
        position: absolute;
        top: 42px;
        right: calc(50% - 33px);
        font-size: 60px;
        font-family: Arial !important;
        display: block;
        margin-bottom: 0px;
        -webkit-transform: scale(0);
        transform: scale(0);
        color: #7d0bbd;
    }

    .zoom {
        -webkit-transform: scale(1) !important;
        transform: scale(1) !important;
    }

    .cLoaderWrap * {
        -webkit-transition: 0.3s ease-in-out;
        -o-transition: 0.3s ease-in-out;
        -moz-transition: 0.3s ease-in-out;
        transition: 0.3s ease-in-out;
    }

    .cLoaderWrap *:not(.fa) {
        font-family: "Cairo", sans-serif !important;
    }

    .cLoaderWrap .cLoaded {
        width: 180px;
        height: 180px;
        position: absolute;
        right: calc(50% - 90px);
        top: 19px;
        font-size: 70px;
        padding-top: 47px;
        color: #7d0bbd;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
</style>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Remaining Unit</h4>
            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('remaining-submit') }}" method='post'>
                        <div class="form-row align-items-center">
                            @csrf
                            <div class="col-md-5">
                                <div class="mb-4">
                                    <label for="applied_for">Category</label>
                                    <select name="applied_for" id="category_name" class="form-control"
                                        onchange="ChangeCategory()" required>
                                        <option value="">Select One</option>
                                        <option value="LIG">LIG</option>
                                        <option value="EWS">EWS</option>
                                    </select>
                                </div>
                                @error('applied_for')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <div class="mb-4">
                                    <label for="flat_no">Flat No.</label>
                                    <select name="flat_no" id="flat_id" class="form-control" required>
                                        <option value="">Flat No.</option>
                                    </select>
                                </div>
                                @error('flat_no')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <button type='submit' class="btn btn-primary">Allotment</button>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- @if(count($remaining) > 0)
    <div>
        <a href="{{route('remaining-delete')}}" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this?')">Truncate</a>
    </div>
    @endif -->

    @if(count($remaining) > 0)
    <div class="container-fluid">
        <div class="card">

            <div class="table-responsive-sm">
                <table class="table table-striped table-centered mb-0">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Flat No </th>
                            <th>Flat Category</th>
                            <th>Application No</th>
                            <th>Applicant Name</th>
                            <th>Co-Applicant Name</th>
                            <th>Phone Number</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($remaining as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->getFlat->flats_no ?? null }}</td>
                            <td>{{ $value->getFlat->category ? $value->flat_category : null }}</td>
                            <td>{{ $value->customer->application_no ?? null }}</td>
                            <td>{{ $value->customer->applicant_name ?? null }}</td>
                            <td>{{ $value->customer->co_applicant_name ?? null }}</td> <!-- Corrected line -->
                            <td>{{ $value->customer->mobile_number ?? null }}</td>
                            <td>{{ $value->customer->category ?? null }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div>
    @endif




</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function ChangeCategory() {
        $.ajax({
            // url: "{{ route('change-category', '') }}/" + $("#category_name").val(),
            url: "{{ route('change.category', '') }}/" + $("#category_name").val(),

            type: "get",
            success: function(data) {
                // alert(data)
                $('#flat_id').empty();
                $('#flat_id').append('<option value="">Flat No</option>');

                $.each(data, function(index, flat_id) {
                    $('#flat_id').append('<option value="' + flat_id.id + '">' + flat_id.flats_no +
                        '</option>');
                });
            }
        });
    }
</script>