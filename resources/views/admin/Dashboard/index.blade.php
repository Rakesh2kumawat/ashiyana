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
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.allotment') }}" method='post'>
                            <div class="form-row align-items-center">
                                @csrf

                                <div class="col-md-5">
                                    <div class="mb-4">
                                        <label for="applied_for">Category</label>
                                        <select name="applied_for" id="category_name" class="form-control"
                                            onchange="ChangeCategory()">
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
                                        <select name="flat_no" id="flat_id" class="form-control">
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
        @if (!empty($customer_details))
            <div class="row" id="applicant-detail">
                <div class="col-md-6">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <div class="toll-free-box text-center">
                                <h2>{{ $customer_details['applicant_name'] }}</h2>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Personal-Information -->
                    <div class="card">
                        <div class="card-body">

                            <div class="text-left">
                                <p class="text-muted"><strong>Application Id :</strong> <span
                                        class="ml-2">{{ $customer_details['application_no'] }}</span></p>
                                <p class="text-muted"><strong>Applicant Name :</strong> <span
                                        class="ml-2">{{ ucwords($customer_details['applicant_name']) }}</span></p>
                                <p class="text-muted"><strong>Mobile :</strong><span
                                        class="ml-2">{{ $customer_details['mobile_number'] }}</span></p>
                                <!-- <p class="text-muted"><strong>Category :</strong> <span
                                        class="ml-2">{{ ucwords($customer_details['type']) }}</span></p> -->
                                <!-- {{-- <p class="text-muted"><strong>Type :</strong> <span
                                        class="ml-2">{{ ucwords($customer_details['category']) }}</span></p> --}} -->
                                <p class="text-muted"><strong>Co. Applicant :</strong> <span
                                        class="ml-2">{{ ucwords($customer_details['co_applicant_name']) }}</span></p>
                                <!-- <p class="text-muted"><strong>Application Date :</strong> <span
                                        class="ml-2">{{ date('d-M-Y', strtotime($customer_details['application_date'])) }}</span>
                                </p> -->



                            </div>
                        </div>
                    </div>
                    <!-- Personal-Information -->

                </div>

            </div>
        @endif
        @if( !empty($customer_) && $customer_[0]  == 'null')

        <div class="col-md-6">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="toll-free-box text-center">
                        <h2>No Application Received</h2>
                    </div>
                </div> <!-- end card-body-->
            </div>
        </div>             @endif

    </div>

    <div class="cLoaderWrap" id="loader" style="display: none;">
        {{-- <svg id="cLoaderSVG" width="120" height="120" xmlns="http://www.w3.org/2000/svg">
            <circle class="cPath" r="70" cy="100" cx="100"></circle>
            <circle class="cLoader" r="70" cy="100" cx="100"></circle>
        </svg>
        <i class="fa fa-check cLoaded zoo"></i>
        <b class="cCount">00</b> --}}
        
        {{-- <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="Loader" width="400px;" height="400px;"> --}}
        <img src="{{asset('spin-wheel.gif')}}" alt="Loader" width="400px;" height="400px;">
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function ChangeCategory() {
        $.ajax({
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

    // $(document).ready(function() {
    //     $('form').submit(function() {
    //         // Show loader for 10 seconds before form submission
    //         $('#loader').css('display', 'block');
    //         setTimeout(function() {
    //             $('#loader').hide();
    //             // Submit the form after 10 seconds
    //             $('form').submit();
    //             $('#loader').css('display', 'none');
    //             $('#applicant-detail').css('display', 'block');
    //         }, 10000);
    //         return false; // Prevent default form submission
    //     });
    // });


    // $(document).ready(function() {
    //     $("form").submit(function(e) {
    //         e.preventDefault();
    //         // Show loader for 10 seconds before form submission
    //         $('#loader').css('display', 'block');
    //         setTimeout(function() {
    //             $("form").submit(); // if you want          
    //             $('#loader').hide();
    //             $('#loader').css('display', 'none');
    //                         // alert('kk');

    //         }, 3000);
    //     });
    // });

    $(document).ready(function() {
    $("form").submit(function(e) {
        e.preventDefault();
        // Show loader
        $('#applicant-detail').css('display', 'none');
        $('#loader').css('display', 'block');
        // Delay form submission
        setTimeout(function() {
            // Submit the form after 10 seconds
            $("form").off("submit").submit(); // Remove the submit event handler to prevent recursion
            // Hide loader after form submission
            $('#loader').hide();
        }, 3000); // 10 seconds delay
    });
});

</script>
