<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::user()->role == 'admin') {
            $projects = Project::all()->count();
            $transactions = Transaction::all();
            $users = User::all()->count();

            return view('admin.dashboard.index', [
                'projects' => $projects,
                'transactions' => $transactions->count(),
                'total_fund' => $transactions->sum('amount'),
                'users' => $users,
            ]);
        } else {
            $projects = Project::where('users_id', Auth::user()->id)->count();
            $transactions = Transaction::where('users_id', Auth::user()->id);
            // $transaction_self = Transaction::with(['project' => function ($child) {
            //     return $child->where('id', Auth::user()->id);
            // }]);

            return view('admin.dashboard.index', [
                'projects' => $projects,
                'transactions' => $transactions->count(),
                'total_fund' => $transactions->sum('amount'),
                'from' => Auth::user()->created_at,
            ]);
        }
    }
}
