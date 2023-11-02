<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin_payment_gateway()
    {
        $paymentGatweays = PaymentGateway::all();
        return view('admin.paymentgateway.index', [
            'paymentGatweays'=>$paymentGatweays,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function admin_payment_gateway_add(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'ac_number'=>'required',
        ]);

        PaymentGateway::insert([
            'name'=>$request->name,
            'ac_number'=>$request->ac_number,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with(['succ', 'Payment Gateway Add']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function payment_gateway_edit($id)
    {
        $paymentGateways = PaymentGateway::find($id);
        return view('admin.paymentgateway.edit', [
            'paymentGateways'=>$paymentGateways,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function payment_gateway_upddate(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'ac_number'=>'required',
            'status'=>'required',
        ]);

        PaymentGateway::where('id', $request->id)->update([
            'name'=>$request->name,
            'ac_number'=>$request->ac_number,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.payment.gateway')->with(['succ', 'Payment Gateway Update']);
    }


}
