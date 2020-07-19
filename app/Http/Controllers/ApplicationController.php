<?php

namespace App\Http\Controllers;

use App\Repository\Blog\BlogRepo;
use App\Repository\Category\CategoryRepo;
use App\Repository\Project\ProjectRepo;
use App\Repository\Setting\SettingRepo;

class ApplicationController extends Controller
{
    protected $project, $category, $blog, $setting;

    public function __construct(
        BlogRepo $blog,
        ProjectRepo $project,
        CategoryRepo $category,
        SettingRepo $setting
    ) {
        $this->blog     = $blog;
        $this->project  = $project;
        $this->category = $category;
        $this->setting  = $setting;
    }

    public function index()
    {
        return view('front.index', [
            'posts'    => $this->blog->widget(),
            'projects' => $this->project->all(),
        ]);
    }

    public function contact()
    {
        return view('front.contact.index', [
            'app' => $this->setting->all()
        ]);
    }
}
