<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;


class CustomerController extends Controller
{
    function index(){
        $result = Customers::orderby('id','desc')->get();
        return view('admin/customers/index',compact('result'));
    }

    function add(){
        return view('admin/customers/add');
    }


    public function register(Request $request){
        $request->validate([
            'application_no' => 'required',
            'application_date' => 'required',
            'applicant_name' => 'required',
            // 'co_applicant_name' => 'required',
            // 'mobile_number' => 'required',
            'type' => 'required',
            'category' => 'required',
            'applied_for' => 'required',
        ], [
            'application_no.required' => 'Applicant No. is required',
            'application_date.required' => 'Application Date name is required',
            'applicant_name.required' => 'Applicant Name is required',
            // 'co_applicant_name.required' => 'Co-Applicant is required',
            // 'mobile_number.required' => 'Mobile number is required',
            'type.required' => 'Type is required',
            'category.required' => 'Category  is required',
            'applied_for.required' => 'Applied For is required',
        ]);

    $result =  new Customers();
    $result->application_no = $request->application_no;
    $result->application_date = $request->application_date;
    $result->applicant_name = $request->applicant_name;
    $result->co_applicant_name = $request->co_applicant_name;
    $result->type = $request->type;
    $result->mobile_number = $request->mobile_number;
    $result->category = $request->category;
    $result->applied_for = $request->applied_for;
    $result->save();
    return redirect()->route('customers.index')->with('success', 'Customer Data Has been Save SuccessFully');
    
    }


    public function update($id){
        $result =  Customers::where('id', $id)->first();
        return view('admin/customers/edit',compact('result'));
    }


    public function edit(Request $request, $id){
        $request->validate([
            'application_no' => 'required',
            'application_date' => 'required',
            'applicant_name' => 'required',
            // 'co_applicant_name' => 'required',
            // 'mobile_number' => 'required',
            'type' => 'required',
            'category' => 'required',
            'applied_for' => 'required',
        ], [
            'application_no.required' => 'Applicant No. is required',
            'application_date.required' => 'Application Date name is required',
            'applicant_name.required' => 'Applicant Name is required',
            // 'co_applicant_name.required' => 'Co-Applicant is required',
            // 'mobile_number.required' => 'Mobile number is required',
            'type.required' => 'Type is required',
            'category.required' => 'Category  is required',
            'applied_for.required' => 'Applied For is required',
        ]);

        $result = Customers::find($id);
        $result->application_no = $request->application_no;
        $result->application_date = $request->application_date;
        $result->applicant_name = $request->applicant_name;
        $result->co_applicant_name = $request->co_applicant_name;
        $result->type = $request->type;
        $result->mobile_number = $request->mobile_number;
        $result->category = $request->category;
        $result->applied_for = $request->applied_for;
        $result->save();
        return redirect()->route('customers.index')->with('success', 'Customer Data Has been Updated SuccessFully');

    }

    public function delete($id){
        $result = Customers::find($id);
        $result->delete();
        return redirect()->route('customers.index');
    }


    public function search(Request $request){

     $applied_for = $request->input('applied_for');
    $category = $request->input('category');

    $query = Customers::query();

    if (!empty($applied_for)) {
        $query->where('applied_for', $applied_for);
    }

    if (!empty($category)) {
        $query->where('category', $category);
    }

    $result = $query->orderBy('id', 'desc')->get();
    return view('admin/customers/index',compact('result'));

    }

}
