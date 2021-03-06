<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function show(Loan $loan)
    {
        return view('livewire.loan.show', compact('loan'));
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect('/loans')->with('danger', 'Loan Deleted Successfully');
    }
}
