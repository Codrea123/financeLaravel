<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Incomes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IncomeController extends Controller
{
    //crud for income model
    public function index()
    {
        $categories = auth()->user()->categories;
        $incomes = Incomes::where('user_id', auth()->user()->id)->get();
        return view('income.index')->with([
            'incomes' => $incomes,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('income.create')->with([
            'categories' => auth()->user()->categories,
        ]);
    }

    public function store(IncomeRequest $request)
    {
        $income = new Incomes();
        $income->name = $request->name;
        $income->amount = $request->amount;
        $income->user_id = auth()->user()->id;
        $income->category_id = $request->category_id;
        $income->save();

        return redirect()->route('income.index')->with('success', 'Income added successfully');
    }

    public function show(Incomes $income)
    {
        return view('income.show', compact('income'));
    }

    public function edit(Incomes $income)
    {
        return view('income.edit', compact('income'));
    }

    public function update(IncomeRequest $request, Incomes $income)
    {
        $income->name = $request->name;
        $income->amount = $request->amount;
        $income->user_id = auth()->user()->id;
        $income->category_id = $request->category_id;
        $income->save();

        return redirect()->route('income.index')->with('success', 'Income updated successfully');
    }

    public function destroy(Incomes $income)
    {;
        $income->delete();

        return redirect()->route('income.index')->with('success', 'Income deleted successfully');
    }
}
