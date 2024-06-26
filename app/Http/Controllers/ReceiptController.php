<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
// =================================================================================================






// =================================================================================================
    public function index()
    {
        //display the resource
        $receipts = Receipt::all();
        return view('dashboard.add_receipts', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // display the form for creating account information
        return view('dashboard.add_receipts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReceiptRequest $request)
    {
        // validate receipt form request aand store a new account
        $receipts = $request->validated();
        
        $receipts = Receipt::create($request->all());

        return redirect()->route('dashboard.add_receipts')
            ->with('success', 'Receipt added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt)
    {
        // display the specific receipt resource
        $receipt = Receipt::where('id', $receipt->id)->first();
        return view('dashboard.view_receipt', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        // display a specific  recipt resource
        $receipt = Receipt::where('id', $receipt->id)->first();
        return view('dashboard.edit_receipt', compact('receipt'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipt $receipt)
    {
        // update a specific resource
        $receipts = $request->validated();
        $receipt->update($request->all());

        return redirect()->route('dashboard.add_receipts')
            ->with('success', 'Receipt updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipt $receipt)
    {
        // delete a specific resource from storage
        $receipt->delete();

        return redirect()->route('dashboard.add_receipts')
            ->with('success', 'Receipt deleted successfully');
    }
}
