<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function addExpense()
    {
        $title = "Add Expense";

        return view('backend.expense.add_expense', compact('title'));
    }
}
