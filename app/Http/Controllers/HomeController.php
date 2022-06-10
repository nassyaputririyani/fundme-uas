<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('home', ['projects' => $projects, 'title' => 'Home']);
    }
}
