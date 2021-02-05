<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::paginate(10);
        return CustomerResource::collection($customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer= new Customer();
        $customer->nameUser=$request->nameUser;
        $customer->nameComplete=$request->nameComplete;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->age=$request->age;
        $customer->dateBirth=$request->dateBirth;

        if($customer->save()){
            return new CustomerResource($customer);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer=Customer::findOrFail($id);
        $customer->nameUser=$request->nameUser;
        $customer->email=$request->email;
        $customer->phone=$request->phone;

        if($customer->save()){
            return new CustomerResource($customer);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::findOrFail($id);

        if($customer->delete()){
            return new CustomerResource($customer);
        }
    }
}
