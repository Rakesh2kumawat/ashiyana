<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Allocation;
use App\Exports\UsersExport;

use Maatwebsite\Excel\Facades\Excel;
class AllocationsController extends Controller
{
    function index(){
        $all_alots =  Allocation::all();
        // $result = Customers::with('allocations')->get();
        return view('admin/alloctions/index',compact('all_alots'));
    }


    
    // public function allotedFlates(){
    //     // $all_alots =  FixAllocation::all();
    //     return view('admin/customers/all_allocations', compact('all_alots'));
    //     }


    public function export()
    {
        return Excel::download(new UsersExport, 'Allocation.xlsx');
    }
 
}
