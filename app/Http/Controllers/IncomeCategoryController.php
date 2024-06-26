<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // get list of all available resource income categories
        $incomeCategories = IncomeCategory::latest()->paginate(6);

        return view('dashboard.income_category', compact('incomeCategories'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //show form for creating a new resource income catgered
        return view('dashboard.income_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // validate the incoming request
        $request->validate([
            'category' =>'required|string|max:255',
            'description' =>'required|string|max:255',
        ]);

        // store the new resource incomecategory in storage
        IncomeCategory::create($request->all());

        return redirect()->back()
            ->with('success', 'Income category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeCategory $incomeCategory):View
    {
        // show specific Resource Incpme category for this income category
        return view('dashboard.show_income_category', compact('incomeCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomeCategory $incomeCategory):View
    {
        // display specific resource income category in form
        $incomeCategories = IncomeCategory::paginate(6);

        return view('dashboard.edit_income_category', compact('incomeCategory','incomeCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IncomeCategory $incomeCategory):RedirectResponse
    {
        // update the income category resource
        $request->validate([
            'category' =>'required|string|max:255',
            'description' =>'required|string|max:255',
        ]);

        $incomeCategory->update($request->all());

        return redirect()->back()
            ->with('success', 'Income category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeCategory $incomeCategory):RedirectResponse
    {
        // delete a specific resource from storage
        $incomeCategory->delete();

        return redirect()->back()
            ->with('success', 'Income category deleted successfully.');
    }
}
