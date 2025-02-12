<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\Remaining;
use Illuminate\Support\Facades\DB;

class RemainingController extends Controller
{
    public function index()
    {
        $remaining = Remaining::orderBy('id', 'desc')->limit(1)->get();
        // $remaining = Remaining::orderBy('id', 'desc')->first();
        $latest = Remaining::latest('id')->get();
        return view('Admin/remaining/index', compact('remaining', 'latest'));
    }


    public function changeCategory($name)
    {
        $flats = Flat::where(['category' => $name, 'status' => 'Y'])->get();
        return response()->json($flats);
    }

    public function submit(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'applied_for' => 'required|string',
            'flat_no' => 'required|string',
        ]);

        $category = $request->input('applied_for');
        $flatNo = $request->input('flat_no');

        // Retrieve a random customer with the specified category
        $customer = Customers::where(['status' => 'Y', 'applied_for' => $category])
        ->where('category', 'General')
        ->inRandomOrder()
        ->first();
    
        if ($customer) {
            // Create a new Remaining record
            Remaining::create([
                'flat_id' => $flatNo,
                'customer_id' => $customer->id,
                'flat_category' => $category,
            ]);

            // Update the customer status
            $customer->update([
                'status' => 'N',
            ]);

            // Update the flat status
            Flat::where('id', $flatNo)->update([
                'status' => 'N',
            ]);

            return redirect()->route('remaining-view')->with('success', 'Flat allotted successfully.');
        } else {
            // Handle the case where no customer was found
            return redirect()->route('remaining-view')->with('error', 'No available customers for the selected category.');
        }
    }



    public function delete()
    {
        // Retrieve all customer IDs associated with remaining flats
        $customerIds = Remaining::pluck('customer_id')->unique(); // Unique customer IDs

        // Retrieve all flat IDs associated with remaining records
        $flatIds = Remaining::pluck('flat_id')->unique(); // Unique flat IDs

        foreach ($customerIds as $customer) {
            $customers = Customers::find($customer);
            if ($customers) {
                $customers->status = 'Y';
                $customers->save();
            }
        }

        foreach ($flatIds as $flatId) {
            $flat = Flat::find($flatId);
            if ($flat) {
                $flat->status = 'Y';
                $flat->save();
            }
        }

        // Truncate the Remaining table
        Remaining::truncate();

        // Redirect to the reservation view with a success message
        return redirect()->route('remaining-view')->with('success', 'All remaining records have been deleted successfully.');
    }



    public function remaining_Unit_allocation(){
          $remaining = Remaining::orderBy('id', 'desc')->get();
          return view('Admin/remainingallocation/index', compact('remaining'));
    }



}
