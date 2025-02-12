<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\FixAllocation;
use App\Models\Customers;
use App\Models\Allocation;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
	private $customer_categories = [
        "EWS" => [
            "SC" => 2,
            "ST" => 1,
            "General" => 10,
            "ARMY" => 2,
            "Govt" => 2,
            "Handicap" => 1   // total flats =  18
        ],
        "LIG" => [
            "SC" => 3,
            "ST" => 2,
            "General" => 21,
            "ARMY" => 4,
            "Govt" => 4,
            "Handicap" => 2   // total Flats =  36
        ]
    ];

    public function index(Request $request){

        return view('admin/Dashboard/index');
    }
    public function allotment(Request $request){
        $request->validate([
            'flat_no' => 'required',
            'applied_for' => 'required',
        ], [
            'flat_no.required' => 'Flat No. is required',
            'applied_for.required' => 'Category is required',
        ]);
		$flat_id = $request->input('flat_no');
		$mainCategory = $request->input('applied_for');
		
        $customer_id = "";
        $customer_details = array();
        $customer_ = [''];
        
		$allocated = false;
		$allocations = Allocation::all()->toArray();
		$newAllocationsArray = [];
		foreach ($allocations as $item) {
            $newAllocationsArray[$item['flat_id']] = $item['customers_id'];
        }
        
        if(array_key_exists($request['flat_no'],$newAllocationsArray) )
        {
            $customer_id = $newAllocationsArray[$request['flat_no']];
			$allocated = true;
        } 
		
		if($customer_id == "")
		{	
			$fixedAllocations = FixAllocation::all()->toArray();
			$newFixArray = [];
			foreach ($fixedAllocations as $item) {
				$newFixArray[$item['flat_id']] = $item['customer_id'];
			}
			
			if(array_key_exists($request['flat_no'],$newFixArray) )
			{
				$customer_id = $newFixArray[$request['flat_no']];
			}   
		}
		
		if($customer_id == "")
		{
			$subcategoryFound = false;

			$subCategories = $this->customer_categories[$mainCategory];
			 $categories = [];
            foreach ($subCategories as $subCategory => $limit) {
                $categories[] = ['main' => $mainCategory, 'sub' => $subCategory, 'limit' => $limit];
            }

		    shuffle($categories); // Randomize the categories array

			foreach ($categories as $category) {
				$mainCategory = $category['main'];
				$subCategory = $category['sub'];
				$maxAllocations = $category['limit'];

				$currentAllocations = Allocation::whereHas('customers', function ($query) use ($mainCategory, $subCategory) {
					$query->where('applied_for', $mainCategory)
						  ->where('category', $subCategory);
				})->count();

				if ($currentAllocations < $maxAllocations) {
					// $customer = Customers::where('applied_for', $mainCategory)
					// 					->where(['category'=> $subCategory,'status' => 'Y'])
					// 					->inRandomOrder()
					// 					->first();

						$customer = Customers::select('customers.*')
                   ->where('customers.applied_for', $mainCategory)
                   ->where('customers.category', $subCategory)->where('customers.status' , 'Y')
                   ->whereNotExists(function ($query) {
                  $query->select(DB::raw(1))
                 ->from('fix_allocations')
                 ->whereRaw('fix_allocations.customer_id = customers.id');
                     })
                ->inRandomOrder()
                ->first();
					if ($customer) {
						$customer_id =  $customer->id;
					}
				}
			}
		}
		// print_r($customer_id); die;
		if($customer_id !="" && $allocated == false){
			// Allocate flat to customer
			$allocation = new Allocation;
			$allocation->flat_id = $flat_id;
			$allocation->customers_id = $customer_id;
			$allocation->save();

			Flat::where('id', $flat_id)->update(['status' => 'N']);
	    	Customers::where('id', $customer_id)->update(['status' => 'N']);

		}

        if($customer_id != "")
        {
            $customer_details = Customers::where('id',$customer_id)->first()->toArray();
			// print_r($customer_details); die;
        }
        else if(empty($customer_id) && $customer_id == ''){
            // echo "test"; die;
            $customer_ = ['null'];
        }

        // print_r($customer_details); die;
        return view('admin/Dashboard/index',compact('customer_details','customer_'));

    }


    public function changeCategory($name){
    $flats = Flat::where(['category' => $name,'status' => 'Y'])->get();
        return response()->json($flats);

    }



    public function total_application()
    {
        return view('admin.Dashboard.total_application');
    }

    


}
