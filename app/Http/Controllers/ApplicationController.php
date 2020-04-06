<?php

namespace App\Http\Controllers;

use App\Repository\Category\CategoryRepo;
use App\Repository\Project\ProjectRepo;

class ApplicationController extends Controller
{
    protected $project;

    protected $category;

    public function __construct(ProjectRepo $project, CategoryRepo $category)
    {
        $this->project  = $project;
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
        $projects   = $this->project->galery();
        $categories = $this->category->hasProject($projects);
        return view('front.galery', compact('projects', 'categories'));
    }
}
