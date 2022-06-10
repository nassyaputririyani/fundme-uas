<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::paginate(9);
        return view('projects', ['projects' => $projects, 'title' => 'Discover Project']);
    }
}
