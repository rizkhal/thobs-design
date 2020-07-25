<?php

namespace App\Http\View\Composers;

use App\Repository\SocialMedia\SocialMediaRepo;
use Illuminate\View\View;

class SocialComposer
{
    /**
     * The social repository implementation
     * 
     * @var SocialMediaRepo
     */
    protected $social;

    public function __construct(SocialMediaRepo $social)
    {
        $this->social = $social;
    }

    public function compose(View $view)
    {
        $view->with('socials', $this->social->all());
    }
}
