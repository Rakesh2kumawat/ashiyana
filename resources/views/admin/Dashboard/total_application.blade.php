@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Total Flat Units & Received Application</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="table-responsive-sm" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-striped table-bordered table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Flats Category</th>
                                <th>Category</th>
                                <th>Flats</th>
                                <th>Application received</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="6">LIG</td>
                                <td>General</td>
                                <td>21</td>
                                <td>75</td>
                            </tr>
                            <tr>
                                <td>SC</td>
                                <td>3</td>
                                <td>14</td>
                            </tr>
                            <tr>
                                <td>ST</td>
                                <td>2</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Army</td>
                                <td>4</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Govt.</td>
                                <td>4</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Handicap</td>
                                <td>2</td>
                                <td>0</td>
                            </tr>
                            <tr>
                            <td></td>
                            <td></td>
                            <td>Total Flats : <b>36</b></td>
                            <td>Total Applications : <b>99</b></td>
                            </tr>

                            

                            <tr>
                                <td colspan="4" style="height: 10px;"></td> <!-- Space between LIG and EWS -->
                            </tr>
                            <tr>
                                <td rowspan="6">EWS</td>
                                <td>General</td>
                                <td>10</td>
                                <td>29</td>
                            </tr>
                            <tr>
                                <td>SC</td>
                                <td>2</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>ST</td>
                                <td>1</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Army</td>
                                <td>2</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Govt.</td>
                                <td>2</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Handicap</td>
                                <td>1</td>
                                <td>0</td>
                            </tr>
                            <tr>
                            <td rowspan="6"></td>
                            <td rowspan="6"></td>
                            <td rowspan="6">Total Flats : <b>18</b></td>
                            <td rowspan="6">Total Applications : <b>34</b></td>


                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
.table {
    border-collapse: collapse;
    width: 100%;
}

.table th,
.table td {
    border: 1px solid #dee2e6; /* Border color */
    padding: 4px; /* Reduced cell padding */
    text-align: left; /* Align text */
}

.table th {
    background-color: #f8f9fa; /* Header background color */
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f2f2f2; /* Alternate row color */
}

.table td {
    line-height: 1.2; /* Adjust line height for closer spacing */
}
</style>
