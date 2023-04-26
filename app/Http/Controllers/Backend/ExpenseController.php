<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function addExpense()
    {
        $title = "Add Expense";

        return view('backend.expense.add_expense', compact('title'));
    }

    public function storeExpense(Request $request)
    {
        Expense::insert([
            'details'       => $request->details,
            'amount'        => $request->amount,
            'month'         => $request->month,
            'year'          => $request->year,
            'date'          => $request->date,
            'created_at'    => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Expense Inserted Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function todayExpense()
    {
        $date   = date('d-m-Y');
        $today  = Expense::where('date', $date)->get();
        $title  = "Today Expense";

        return view('backend.expense.today_expense', compact('date', 'today', 'title'));
    }

    public function editExpense($id)
    {
        $expense    =  Expense::findOrFail($id);
        $title      = "Edit Expense";

        return view('backend.expense.edit_expense', compact('title', 'expense'));
    }

    public function updateExpense(Request $request)
    {
        $expense_id = $request->id;

        Expense::findOrFail($expense_id)->update([
            'details'       => $request->details,
            'amount'        => $request->amount,
            'month'         => $request->month,
            'year'          => $request->year,
            'date'          => $request->date,
            'updated_at'    => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Expense Updated Successfull',
            'alert-type'    => 'success',
        );

        return redirect()->route('today.expense')->with($notification);
    }
}
