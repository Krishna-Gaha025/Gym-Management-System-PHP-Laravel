<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class DashboardController extends Controller
{
    public function transaction()
    {
        $expense = Transactions::get()->where('ttype', 'expense');
        $income = Transactions::get()->where('ttype', 'income');
        $allDetails = Transactions::latest()->get();
        $exp = 0;
        $inc = 0;
        foreach ($income as $value) {
            $inc = $inc + $value->tamount;
        }
        foreach ($expense as $value) {
            $exp = $exp + $value->tamount;
        }
        return view('admin.index', ['expense' => $exp, 'income' => $inc, 'alldetails' => $allDetails]);
    }
}
