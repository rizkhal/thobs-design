<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Project\ProjectRepo;

class ApplicationController extends Controller
{
    protected $project;

    public function __construct(ProjectRepo $project)
    {
        $this->project = $project;
    }

    public function index()
    {
        $projects = $this->project->all();
    	return view('front.index', compact('projects'));
    }

    public function about()
    {
    	# code...
    }

    public function contact()
    {
    	# code...
    }
}
