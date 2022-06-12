<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyPayment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::query();

        if (Auth::user()->role == 'user') {
            $transactions->where('users_id', Auth::user()->id);
        }

        return view('admin.transaction.index', ['transactions' => $transactions->get()]);
    }

    public function changeStatus($id, Request $request) {
        $transaction = Transaction::findOrFail($id);

        if ($request->status == 'paid') {
            if (Auth::user()->role != 'admin') {
                return redirect()->route('admin.transactions.index')->with('error', 'Only admin can accept payment manually');
            }
            Mail::to($transaction->user->email)->send(new NotifyPayment());
        }

        $transaction->status = $request->status;
        $transaction->save();

        return redirect()->route('admin.transactions.index')->with('success', 'Succeed change status for transaction ' . $transaction->id);
    }
}
