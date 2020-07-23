<!-- left sidebar -->
<div class="sidebar" id="sidebar-nav">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li>
                    <a class="{{ active('dashboard') }}" href="{{ route('dashboard') }}">
                        <i class="lnr lnr-home">
                        </i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <a class="{{ active('manage/blog*') }}" href="{{ route('admin.blog.index') }}">
                        <i class="lnr lnr-bullhorn">
                        </i>
                        <span>
                            Blog
                        </span>
                    </a>
                </li>
                <li>
                    <a class="{{ active('manage/projects*') }}" href="{{ route('admin.projects.index') }}">
                        <i class="lnr lnr-store">
                        </i>
                        <span>
                            Project
                        </span>
                    </a>
                </li>
                <li>
                    <a class="{{ active(['manage/shortener*', 'manage/stats*']) }}" href="{{ route('admin.shortener.index') }}">
                        <i class="lnr lnr-chart-bars">
                        </i>
                        <span>
                            Short Url
                        </span>
                    </a>
                </li>
                <li>
                    <a class="{{ active(['manage/setting*']) }}" data-toggle="collapse" href="#setting">
                        <i class="lnr lnr-cog">
                        </i>
                        <span>
                            Setting
                        </span>
                        <i class="icon-submenu lnr lnr-chevron-left">
                        </i>
                    </a>
                    <div class="collapse {{ active(['manage/setting*']) }}" id="setting">
                        <ul class="nav">
                            <li>
                                <a class="{{ active('manage/setting/pages*') }}" href="{{ route('admin.setting.pages') }}">
                                    <span>
                                        Pages
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ active('manage/setting/profile*') }}" href="{{ route('admin.setting.profile.index') }}">
                                    <span>
                                        Profile
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ active('manage/setting/social*') }}" href="{{ route('admin.setting.social.index') }}">
                                    <span>
                                        Social Media
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="{{ active('manage/category') }}" data-toggle="collapse" href="#master">
                        <i class="lnr lnr-database">
                        </i>
                        <span>
                            Data Master
                        </span>
                        <i class="icon-submenu lnr lnr-chevron-left">
                        </i>
                    </a>
                    <div class="collapse {{ active('manage/category') }}" id="master">
                        <ul class="nav">
                            <li>
                                <a class="{{ active('manage/category') }}" href="{{ route('admin.category.index') }}">
                                    <span>
                                        Category
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- end left sidebar -->
