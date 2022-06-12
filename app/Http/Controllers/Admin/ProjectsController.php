<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::query();

        if (Auth::user()->role == 'user') {
            $projects->where('users_id', Auth::user()->id);
        }

        return view('admin.projects.index', ['projects' => $projects->get()]);
    }

    public function add() {
        $users = null;
        if (Auth::user()->role == 'admin') {
            $users = User::all();
        }
        return view('admin.projects.add', ['users' => $users]);
    }

    public function show($id) {
        $project = Project::findOrFail($id);
        // $rank_transactions = DB::raw('SELECT  FROM transactions');
        $rank_transactions = DB::table('transactions')
            ->join('users', 'users.id', '=' , 'transactions.users_id')
            ->join('projects', 'projects.id', '=', 'transactions.projects_id')
            ->selectRaw('users.name, transactions.id, transactions.amount, DENSE_RANK() OVER (ORDER BY transactions.amount DESC) as rank')
            ->where('projects.id', '=', $project->id)
            ->get();

        return view('admin.projects.detail', ['project' => $project, 'rank_transactions' => $rank_transactions]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
            'goals' => ['required'],
            'goal_amount' => ['required'],
            'deadline' => ['required'],
            'business_proposal' => ['required'],
            'image' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'goals' => implode(',', $request->goals),
            'goal_amount' => $request->goal_amount,
            'deadline' => $request->deadline,
            'users_id' => Auth::user()->id
        ];

        if ($request->users_id) {
            $data['users_id'] = $request->users_id;
        }

        if ($request->file('business_proposal')) {
            $name = $request->file('business_proposal')->getClientOriginalName();
            $filename = uniqid() . '-' . trim($name);

            $business_proposal_path = public_path('business_proposal');
            if (!file_exists($business_proposal_path)) {
                mkdir($business_proposal_path, 0777, true);
            }

            $data['business_proposal_url'] = $filename;

            $request->file('business_proposal')->move($business_proposal_path, $filename);
        }

        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $filename = uniqid() . '-' . trim($name);

            $image_path = public_path('image');
            if (!file_exists($image_path)) {
                mkdir($image_path, 0777, true);
            }

            $data['image_url'] = $filename;

            $request->file('image')->move($image_path, $filename);
        }

        Project::create($data);

        return redirect()->route('admin.projects.index');
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        $users = null;
        if (Auth::user()->role == 'admin') {
            $users = User::all();
        }

        return view('admin.projects.edit', ['project' => $project, 'users' => $users]);
    }

    public function update($id, Request $request) {
        $project = Project::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
            'goals' => ['required'],
            'goal_amount' => ['required'],
            'deadline' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'goals' => implode(',', $request->goals),
            'goal_amount' => $request->goal_amount,
            'deadline' => $request->deadline,
            'users_id' => Auth::user()->id
        ];

        if ($request->users_id) {
            $data['users_id'] = $request->users_id;
        }

        if ($request->status) {
            $data['status'] = $request->status;
        }

        if ($request->file('business_proposal')) {
            $name = $request->file('business_proposal')->getClientOriginalName();
            $filename = uniqid() . '-' . trim($name);

            $business_proposal_path = public_path('business_proposal');
            if (!file_exists($business_proposal_path)) {
                mkdir($business_proposal_path, 0777, true);
            }

            if (file_exists(public_path('business_proposal') . '/' . $project->business_proposal_url)) {
                unlink(public_path('business_proposal') . '/' . $project->business_proposal_url);
            }

            $data['business_proposal_url'] = $filename;

            $request->file('business_proposal')->move($business_proposal_path, $filename);
        }

        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $filename = uniqid() . '-' . trim($name);

            $image_path = public_path('image');
            if (!file_exists($image_path)) {
                mkdir($image_path, 0777, true);
            }

            if (file_exists(public_path('image') . '/' . $project->image_url)) {
                unlink(public_path('image') . '/' . $project->image_url);
            }

            $data['image_url'] = $filename;

            $request->file('image')->move($image_path, $filename);
        }

        $project->update($data);

        return redirect()->route('admin.projects.index');
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);

        if (file_exists(public_path('image') . '/' . $project->image_url)) {
            unlink(public_path('image') . '/' . $project->image_url);
        }

        if (file_exists(public_path('business_proposal') . '/' . $project->business_proposal_url)) {
            unlink(public_path('business_proposal') . '/' . $project->business_proposal_url);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Success deleted project');
    }
}
