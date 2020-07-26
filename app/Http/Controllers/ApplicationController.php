<?php

namespace App\Http\Controllers;

use App\Repository\Blog\BlogRepo;
use App\Repository\Project\ProjectRepo;
use App\Repository\Setting\SettingRepo;
use App\Repository\SocialMedia\SocialMediaRepo;

class ApplicationController extends Controller
{
    protected $project, $category, $blog, $setting, $social;

    public function __construct(
        BlogRepo $blog,
        ProjectRepo $project,
        SettingRepo $setting,
        SocialMediaRepo $social
    ) {
        $this->blog    = $blog;
        $this->project = $project;
        $this->setting = $setting;
        $this->social  = $social;
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
            'app'     => $this->setting->all(),
            'socials' => $this->social->all(),
        ]);
    }

    public function about()
    {
        return view('front.about.index', [
            'setting' => $this->setting->all(),
            'socials' => $this->social->all(),
        ]);
    }
}
