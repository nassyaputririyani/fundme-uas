<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $projects = Project::query()->orderBy('created_at', 'desc')->limit(10)->get();
        return view('home', ['projects' => $projects, 'title' => 'Home']);
    }
}
