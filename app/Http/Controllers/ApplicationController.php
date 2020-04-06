<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Project\ProjectRepo;
use App\Repository\Category\CategoryRepo;

class ApplicationController extends Controller
{
    protected $project;

    protected $category;

    public function __construct(ProjectRepo $project, CategoryRepo $category)
    {
        $this->project = $project;
        $this->category = $category;
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

    public function galery()
    {
        $projects = $this->project->all();
        $categories = $this->category->hasProject();
        return view('front.galery', compact('projects', 'categories'));
    }
}
