<?php

namespace App\Http\Controllers;

use App\Repository\Blog\BlogRepo;
use App\Repository\Category\CategoryRepo;
use App\Repository\Project\ProjectRepo;

class ApplicationController extends Controller
{
    protected $project, $category, $blog;

    public function __construct(
        BlogRepo $blog,
        ProjectRepo $project,
        CategoryRepo $category
    ) {
        $this->blog     = $blog;
        $this->project  = $project;
        $this->category = $category;
    }

    public function index()
    {
        return view('front.index', [
            'posts'    => $this->blog->widget(),
            'projects' => $this->project->all(),
        ]);
    }
}
