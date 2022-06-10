<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::paginate(9);
        return view('projects', ['projects' => $projects, 'title' => 'Discover Project']);
    }

    public function detail($id) {
        $project = Project::findOrFail($id);
        return view('detail-projects', ['project' => $project, 'title' => 'Detail Project']);
    }

    public function fundProject($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'amount' => ['required', 'min:0', 'integer']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        return redirect()->route('project.fund-project.success', 2);
    }

    public function showSuccessPage() {
        return view('success-transaction', ['title' => 'Success add transaction']);
    }
}
