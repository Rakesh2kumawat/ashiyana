<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Reservation;



class ReservationController extends Controller
{
    public function index()
    {

        $customerIds = Reservation::pluck('customer_id');
        $customerIdsData = Customers::whereIn('id', $customerIds)->get();

        return view('admin/reservation/index', compact('customerIdsData'));
    }

    public function submit()
    {

        // echo "tets"; die;
        // Check if there are already reservations
        if (Reservation::count() > 0) {
            return redirect()->route('reservation-view')->with('info', 'Reservations already exist. No new entries were made.');
        }

        // Retrieve 4 random LIG customers
        $ligCustomers = Customers::where(['applied_for' => 'LIG', 'status' => 'Y'])
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // Retrieve 4 random EWS customers
        $ewsCustomers = Customers::where(['applied_for' => 'EWS', 'status' => 'Y'])
            ->inRandomOrder()
            ->limit(2)
            ->get();

        // Combine both collections
        $combinedCustomers = $ligCustomers->merge($ewsCustomers);

        // Insert into the reservations table
        foreach ($combinedCustomers as $customer) {
            Reservation::create([
                'customer_id' => $customer->id,
            ]);

            Customers::where('id', $customer->id)->update([
                'status' => 'N',
            ]);
        }

        return redirect()->route('reservation-view')->with('success', 'Reservations have been created successfully.');
    }



    public function delete()
    {
        // Truncate the reservations table

        // Retrieve all customer IDs associated with remaining flats
        $customerIds = Reservation::pluck('customer_id')->unique(); // Unique customer IDs

        foreach ($customerIds as $customer) {
            $customers = Customers::find($customer);
            if ($customers) {
                $customers->status = 'Y';
                $customers->save();
            }
        }

        Reservation::truncate();

        // Redirect to the reservation view with a success message
        return redirect()->route('reservation-view')->with('success', 'All reservations have been deleted successfully.');
    }
}
