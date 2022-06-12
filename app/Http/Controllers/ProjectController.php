<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Transaction;
use App\Services\CreateSnapURLService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('projects', ['projects' => $projects, 'title' => 'Discover Project']);
    }

    public function detail($id) {
        $project = Project::findOrFail($id);
        $size = -1;
        if (file_exists(public_path('business_proposal') . '/' . $project->business_proposal_url)) {
            $size = File::size(public_path('business_proposal') . '/' . $project->business_proposal_url);
        }
        return view('detail-projects', ['project' => $project, 'title' => 'Detail Project', 'size' => $size]);
    }

    public function fundProject($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'amount' => ['required', 'min:0', 'integer']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $users_id = Auth::user()->id;

        $data = [
            'users_id' => $users_id,
            'projects_id' => $id,
            'amount' => $request->amount,
            'payment_url' => 'https://google.com'
        ];

        $transaction = Transaction::create($data);

        $midtrans = new CreateSnapURLService($transaction);
        $snapToken = $midtrans->getSnapURL();

        $transaction->payment_url = $snapToken;
        $transaction->save();

        return redirect()->route('project.fund-project.success')->with('success', 'Berhasil membuat transaksi');
    }

    public function showSuccessPage() {
        return view('success-transaction', ['title' => 'Success add transaction']);
    }
}
